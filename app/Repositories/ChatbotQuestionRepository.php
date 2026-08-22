<?php

namespace App\Repositories;

use App\Models\ChatbotQuestion;

class ChatbotQuestionRepository extends BaseRepository
{
    public function __construct(ChatbotQuestion $model)
    {
        parent::__construct($model);
    }

    public function getActiveOrdered()
    {
        return $this->model->where('is_active', true)->orderBy('order', 'asc')->get();
    }
}
