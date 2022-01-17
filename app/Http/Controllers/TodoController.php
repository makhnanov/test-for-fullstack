<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Todo;
use HTMLPurifier;
use HTMLPurifier_Config;

class TodoController extends Controller
{
    public function get()
    {
        return response()->json([
            'todos' => Todo::all()->sortBy('completed'),
        ]);
    }

    public function create()
    {
        $config = HTMLPurifier_Config::createDefault();
        $config->set('Core.Encoding', 'UTF8');
        $config->set('Cache.SerializerPath', base_path('storage/framework/cache/htmlpurifier'));
        $config->set('HTML.Allowed', '');
        $purifier = new HTMLPurifier($config);
        try {
            $params = request('params');
            if (!$params['title']) {
                throw new \Exception('Invalid data');
            }
            $todo = new Todo();
            $todo->title = $purifier->purify($params['title']);
            $todo->description = $purifier->purify($params['description'] ?? '');
            $todo->save();
        } catch (\Throwable $e) {
            return response()->json([
                'result' => $e->getMessage(),
            ]);
        }
        return response()->json([
            'result' => true,
        ]);
    }

    public function delete()
    {
        try {
            $completed = request('completed');
            if (is_array($completed)) {
                foreach ($completed as &$id) {
                    if (!is_string($id)) {
                        throw new \Exception('Bad data');
                    }
                    $id = intval($id);
                }
                $completed = array_filter($completed);
                if ($completed) {
                    Todo::destroy($completed);
                }
            }
        } catch (\Exception $e) {
            // Silent
        }
        return $this->get();
    }

    public function toggle()
    {
        try {
            $params = request('params');
            $todo = Todo::where('id', '=', intval($params['id']))->first();
            $todo->completed = intval($params['completed']);
            $todo->save();
        } catch (\Throwable $e) {
            return response()->json([
                'result' => false,
            ]);
        }
        return response()->json([
            'result' => true,
        ]);
    }
}
