<?php

namespace App\Services;

use App\Repositories\ChatbotQuestionRepository;

class ChatbotQuestionService extends BaseService
{
    public function __construct(ChatbotQuestionRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getActiveQuestions()
    {
        return $this->repository->getActiveOrdered();
    }
}
