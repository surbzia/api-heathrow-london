<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Helpers\ImageUtil;
use App\Models\Admin\File;

class FileRepository implements BaseRepository
{
    protected $model;
    public function __construct(File $model)
    {
        $this->model = $model;
    }
    public function find($id): File
    {
        return $this->model->find($id);
    }
    public function findByTableOnly($table_name, $q)
    {
        $data =  $this->model->where('table_name', $table_name);
        if ($q) {
            $data = $data->Where(
                function ($query) use ($q) {
                    $query->orWhere('url', 'like', '%' . $q . '%');
                }
            );
        }
        return $data->get();
    }
    public function findByTable($table_name, $ref_id, $type = 2): File
    {
        if ($type == 2) {
            return $this->model->where('table_name', $table_name)->where('ref_id', $ref_id)->get();
        } else {
            return $this->model->where('table_name', $table_name)->where('ref_id', $ref_id)->first();
        }
    }
    public function create($files, $table_name, $ref_id, $type = 2): array
    {
        $result = [];
        $plural_table = Str::studly(Str::singular($table_name));
        if ($type == 1) {
            File::where('fileable_id', $ref_id)->where('table_name', $table_name)->where('fileable_type', 'App\Models\\' . $plural_table)->delete();
        }
        foreach ($files as $file) {
            $path = $file->store('public/' . $table_name);
            $fileData = File::create([
                'url' => $path,
                'fileable_id' => $ref_id,
                'fileable_type' => 'App\Models\\' . $plural_table,
                'table_name' => $table_name,
                'extension' => $file->getClientOriginalExtension(),
            ]);
            $result[] = $fileData;
        }
        return $result;
    }
    public function delete($id)
    {
        $this->model->delete($id);
    }
    public function deleteByType($table_name, $ref_id)
    {
        $this->model->where('table_name', $table_name)->where('ref_id', $ref_id)->delete();
    }
    public function updateRefById($id, $ref_id)
    {
        $model = $this->model->find($id);
        $model->fileable_id = $ref_id;
        $model->save();
    }
}
