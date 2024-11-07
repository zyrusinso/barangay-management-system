<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LuponCaseResource\Pages;
use App\Filament\Resources\LuponCaseResource\RelationManagers;
use App\Models\LuponCase;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Enum\CaseStatus;
use App\Enum\CasePriority;

class LuponCaseResource extends Resource
{
    protected static ?string $model = LuponCase::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Cases';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('case_number')
                    ->required()
                    ->maxLength(50),
                Forms\Components\Textarea::make('case_description')
                    ->columnSpanFull(),
                Forms\Components\Select::make('case_status')
                    ->options(collect(CaseStatus::cases())->pluck('value', 'value'))
                    ->enum(CaseStatus::class)
                    ->required(),
                Forms\Components\TextInput::make('resident_complaint_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('resident_defendant_id')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('case_priority')
                    ->options(collect(CasePriority::cases())->pluck('value', 'value'))
                    ->enum(CasePriority::class)
                    ->required(),
                Forms\Components\Select::make('lupon_id')
                    ->label('Lupon')
                    ->required()
                    ->relationship('lupon', 'first_name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('case_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('case_status')
                    ->enum(CaseStatus::class),
                Tables\Columns\TextColumn::make('resident_complaint_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('resident_defendant_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('case_priority')
                    ->enum(CasePriority::asArray()),
                Tables\Columns\TextColumn::make('lupon_head_id')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListLuponCases::route('/'),
            'create' => Pages\CreateLuponCase::route('/create'),
            'edit' => Pages\EditLuponCase::route('/{record}/edit'),
        ];
    }
}
