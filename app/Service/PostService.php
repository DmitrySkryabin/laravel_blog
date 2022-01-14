<?php

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            Db::beginTransaction();

            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
            $post->update($data);

            Db::commit();
        } catch (Exception $exception) {
            abort(500);
        }
    }

    public function update($data, $post)
    {
        try {
            Db::beginTransaction();

            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            }
            $post->update($data);
            $post->tags()->sync($tagIds);

            Db::commit();
        } catch (Exception $exception) {
            abort(500);
        }

        return $post;
    }
}
