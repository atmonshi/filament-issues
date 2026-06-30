<?php

namespace App\Filament\Pages;

use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\OneTimeCodeInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;

class Otp extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    protected string $view = 'filament.pages.otp';

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Schema $schema): Schema
    {
        return $schema->schema([
            OneTimeCodeInput::make('otp_code')
                ->length(8)
                ->helperText('`->length(8)` and `->default(12345678)`')
                ->default(12345678)
                ->required(),
        ])
            ->statePath('data');
    }
}
