<?php

namespace SlackApi\Enums;

enum SlackPlans: string {
    case FREE = 'Free plan';
    case STD = 'Pro plan';
    case PLUS = 'Business+ plan';
    case ENTERPRISE = 'Enterprise Grid plan';
    case COMPLIANCE = 'Enterprise Compliance Select plan';

    public function description(): array {
        return match(strtolower($this->name)) {
            'free' => ['free' => self::FREE->value],
            'std' => ['std' => self::STD->value],
            'plus' => ['plus' => self::PLUS->value],
            'enterprise' => ['enterprise' => self::ENTERPRISE->value],
            'compliance' => ['compliance' => self::COMPLIANCE->value],
            default => throw new \Exception("Invalid plan: {$this->name}")
        };
    }
}



