<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lib\File\FileUploader;
use App\Models\Categore;
use App\Models\Item;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

class ItemCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $items = Item::with(['categore'])->orderBy('created_at', 'DESC')->paginate(15);

        return view('admin.items.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.items.create', [
            'itemCategores' => Categore::get(),
            'roomTypes' => RoomType::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'categore_id' => 'required',
            'logo_image' => 'nullable|image|max:2048',
            'main_image' => 'required|image|max:2048',
            'image_gallery.*' => 'image|max:2048',
            'contact_data' => 'nullable|array',
            'contact_data.*' => 'nullable|string',
            'social_links' => 'nullable|array',
            'social_links.*' => 'nullable|string',
            'roomType' => 'nullable|array',
            'roomType.*.check' => 'required',
            'roomType.*.price' => 'required',
        ]);
        if ($validate->fails()) {
            die(var_dump($validate->errors()));
            $notification = array(
                'message' => 'مقادیر ورودی معتبر نیست.',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        $slug = str_replace(' ', '-', $request->title);
        $item = [
            'title' => $request->title,
            'slug' => Carbon::now()->timestamp . '-' . $slug,
            'categore_id' => $request->categore_id,
            'description' => $request->description,
        ];




        if ($request->file('main_image')) {
            $item['main_image'] =  FileUploader::move($request->file('main_image'), 'items');
        }
        if ($request->file('logo_image')) {
            $item['logo_image'] =  FileUploader::move($request->file('logo_image'), 'items');
        }
        $image_gallery = [];

        if ($request->file('image_gallery')) {
            foreach ($request->file('image_gallery') as $image) {
                $image_gallery[] = [
                    'url' =>  FileUploader::move($image, 'items')
                ];
            }
        }
        $item['image_gallery'] = $image_gallery;
        if (is_array($request->contact_data)) {
            $item['contact_data'] = [
                'address' => @$request->contact_data['address'],
                'phone' => @$request->contact_data['phone'],
                'email' => @$request->contact_data['email'],
                'website' => @$request->contact_data['website'],
            ];
        }
        if (is_array($request->social_links)) {
            $item['social_links'] = [
                'facebook' => @$request->social_links['facebook'],
                'twitter' => @$request->social_links['twitter'],
                'instagram' => @$request->social_links['instagram'],
            ];
        }


        if ($item['categore_id'] != 1) {
            $item['price'] = convert($request->price);
        }
        $item = Item::create($item);
        $item->save();

        if ($item['categore_id'] == 1) {
            foreach ($request->roomType as $key => $roomType) {
                if ($roomType['check'] == true || $roomType['check'] == 'on') {

                    $item->roomTypes()->attach([$key => [
                        'price' => convert($roomType['price'])
                    ]]);
                }
            }

            $item->update(['price' => $item->roomTypes()->pluck('price')->min()]);
        }

        $notification = array(
            'message' => 'تغییرات با موفقیت ذخیره شد.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.items.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Item::where('id', $id)->with(['categore', 'roomTypes'])->first();
        if (!$item) {
            abort(404);
        }
        return view('admin.items.edit', [
            'item' => $item,
            'itemCategores' => Categore::get(),
            'roomTypes' => RoomType::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Item::where('id', $id)->with(['categore', 'roomTypes'])->first();
        if (!$item) {
            abort(404);
        }

        $updateData = [
            'title' => $request->title,
            'categore_id' => $request->categore_id,
            'description' => $request->description
        ];

        if ($request->file('main_image')) {
            $updateData['main_image'] =  FileUploader::move($request->file('main_image'), 'items');
        } 
        if ($request->file('logo_image')) {
            $updateData['logo_image'] =  FileUploader::move($request->file('logo_image'), 'items');
        } 
        $image_gallery = [];
        if ($request->file('image_gallery')) {
            foreach ($request->file('image_gallery') as $image) {
                $image_gallery[] = [
                    'url' =>  FileUploader::move($image, 'items')
                ];
            }
            $updateData['image_gallery'] = $image_gallery;
        }

        if (is_array($request->contact_data)) {
            $updateData['contact_data'] = [
                'address' => @$request->contact_data['address'],
                'phone' => @$request->contact_data['phone'],
                'email' => @$request->contact_data['email'],
                'website' => @$request->contact_data['website'],
            ];
        }
        if (is_array($request->social_links)) {
            $updateData['social_links'] = [
                'facebook' => @$request->social_links['facebook'],
                'twitter' => @$request->social_links['twitter'],
                'instagram' => @$request->social_links['instagram'],
            ];
        }

        $item->update($updateData);
        if ($item->categore->slug  != 'hotels') {
            $item->update(['price' => convert($request->price)]);
        } else {
            foreach ($request->roomType as $key => $roomType) {
                $existRoomType = null;
                foreach ($item->roomTypes as $value) {
                    if ($key == $value->id) {
                        $existRoomType = $value;
                        break;
                    }
                }
                if ($existRoomType) {
                    $item->roomTypes()->updateExistingPivot($key, [
                        'price' => $roomType['price']
                    ]);
                } else {
                    $item->roomTypes()->attach($key, ['price' => convert($roomType['price'])]);
                }
            }


            foreach ($item->roomTypes as $value) {
                $existRoomType = null;
                foreach ($request->roomType as $key => $r) {
                    if ($key == $value->id) {
                        $existRoomType = $value;
                        break;
                    }
                }
                if (!$existRoomType) {
                    $item->roomTypes()->updateExistingPivot($value->id, [
                        'status' => '0'
                    ]);
                }
            }
            $item->update(['price' => $item->roomTypes()->pluck('price')->min()]);
        }

        $notification = array(
            'message' => 'تغییرات با موفقیت ذخیره شد.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.items.edit', ['item_id' => $item->id])->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::where('id', $id)->first();
        if (!$item) {
            abort(404);
        }

        $item->update(['status' => '0']);

        $notification = array(
            'message' => 'تغییرات با موفقیت ذخیره شد.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.items.index', ['item_id' => $item->id])->with($notification);
    }
}
