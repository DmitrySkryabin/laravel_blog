<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Exception;

class PostService
{
    public function store($data)
    {
        try {
            Db::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            $post = Post::firstOrCreate($data);
            if (isset($tagIds)) {
                $post->tags()->attach($tagIds);
            }
            $post->update($data);

            Db::commit();
        } catch (Exception $exception) {
            //dd($exception);
            Db::rollBack();
            abort(500);
        }
    }

    public function update($data, $post)
    {
        try {
            Db::beginTransaction();

            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            }
            $post->update($data);
            if (isset($tagIds)) {
                $post->tags()->sync($tagIds);
            }

            Db::commit();
        } catch (Exception $exception) {
            //dd($exception);
            Db::rollBack();
            abort(500);
        }

        return $post;
    }
}
