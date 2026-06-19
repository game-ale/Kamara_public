<?php
namespace App\Filament\Resources\LeadershipResource\Pages;
use App\Filament\Resources\LeadershipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListLeadership extends ListRecords
{
    protected static string $resource = LeadershipResource::class;
    protected function getHeaderActions(): array { return [Actions\CreateAction::make()]; }
}
