<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MedicalReferralResource\Pages;
use App\Filament\Resources\MedicalReferralResource\RelationManagers;
use App\Models\MedicalReferral;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Enum\MedicalReferralStatus;

class MedicalReferralResource extends Resource
{
    protected static ?string $model = MedicalReferral::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('case_id')
                    ->required()
                    ->relationship('luponCase', 'case_number'),
                Forms\Components\Select::make('resident_id')
                    ->required()
                    ->relationship('resident', 'first_name'),
                Forms\Components\TextInput::make('healthcare_facility')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('referral_date'),
                Forms\Components\Textarea::make('purpose')
                    ->columnSpanFull(),
                Forms\Components\Select::make('status')
                    ->options(collect(MedicalReferralStatus::cases())->pluck('value', 'value')),
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
                Tables\Columns\TextColumn::make('resident.first_name')
                    ->label('Patient Name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('healthcare_facility')
                    ->searchable(),
                Tables\Columns\TextColumn::make('referral_date')
                    ->date()
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
            'index' => Pages\ListMedicalReferrals::route('/'),
            'create' => Pages\CreateMedicalReferral::route('/create'),
            'edit' => Pages\EditMedicalReferral::route('/{record}/edit'),
        ];
    }
}
