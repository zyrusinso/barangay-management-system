<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EscalatedCaseResource\Pages;
use App\Filament\Resources\EscalatedCaseResource\RelationManagers;
use App\Models\EscalatedCase;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Enum\EscalatedCaseStatus;

class EscalatedCaseResource extends Resource
{
    protected static ?string $model = EscalatedCase::class;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-circle';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('case_id')
                    ->required()
                    ->relationship('luponCase', 'case_number'),
                Forms\Components\DatePicker::make('escalation_date'),
                Forms\Components\TextInput::make('pnp_received_id')
                    ->numeric(),
                Forms\Components\Textarea::make('reason')
                    ->columnSpanFull(),
                Forms\Components\Select::make('escalated_by')
                    ->required()
                    ->relationship('lupon', 'first_name'),
                Forms\Components\Select::make('status')
                    ->options(collect(EscalatedCaseStatus::cases())->pluck('value', 'value')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('luponCase.case_number')
                    ->label('Case Number')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('escalation_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pnp_received_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lupon.fullname')
                    ->label('Escalated By')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEscalatedCases::route('/'),
            'create' => Pages\CreateEscalatedCase::route('/create'),
            'edit' => Pages\EditEscalatedCase::route('/{record}/edit'),
        ];
    }
}
