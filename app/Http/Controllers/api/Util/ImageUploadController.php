<?php

namespace App\Http\Controllers\api\Util;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dedoc\Scramble\Attributes\Group;
use Illuminate\Support\Facades\Validator;

#[Group('Common')]
class ImageUploadController extends Controller
{
    /**
     * Upload Image
     */
    public function imageUpload(Request $request) {
        $validator = Validator::make($request->all(), [
            'profile_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid image file',
                'errors' => $validator->errors(),
            ], 422);
        }

        $path = $request->file('profile_img')->store('profile_images', 'public');

        return response()->json([
            'message' => 'Image uploaded successfully',
            'path' => $path,
        ]);
    }
}
