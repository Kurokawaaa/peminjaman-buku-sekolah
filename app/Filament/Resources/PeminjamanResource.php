<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeminjamanResource\Pages;
use App\Filament\Resources\PeminjamanResource\RelationManagers;
use App\Models\Peminjaman;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Stmt\Label;

class PeminjamanResource extends Resource
{
    protected static ?string $model = Peminjaman::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_peminjam'),
                TextInput::make('kelas'),
                TextInput::make('nama_buku'),
                TextInput::make('banyak_buku'),
                TextInput::make('lama_meminjam'),
                Select::make('status')
                ->options([
                    'dipinjam'=>'Dipinjam',
                    'dikembalikan' => 'Dikembalikan'
                ])
                ->default('dipinjam')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_peminjam')
                ->label('Nama')
                ->sortable()
                ->searchable(),
                TextColumn::make('email'),
                TextColumn::make('kelas')
                ->sortable()
                ->searchable(),
                TextColumn::make('nama_buku')
                ->sortable()
                ->searchable(),
                TextColumn::make('banyak_buku')
                ->label('Jumlah')
                ->sortable()
                ->searchable(),
                TextColumn::make('lama_meminjam')
                ->formatStateUsing(fn ($state) => $state . ' Jam')
                ->sortable()
                ->searchable(),
                TextColumn::make('created_at')
                ->label('Dipinjam')
                ->since(),
                TextColumn::make('status')
                ->colors([
                    'warning'=> 'dipinjam',
                    'success'=> 'dikembalikan'
                ])
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('kembalikan')
                ->label('Kembalikan')
                ->color('success')
                ->icon('heroicon-o-check-circle')
                ->requiresConfirmation() // ✅ aktifkan konfirmasi
                ->modalHeading('Konfirmasi Pengembalian')
                ->modalSubheading('Apakah Anda yakin buku ini sudah dikembalikan?')
                ->modalButton('Ya, kembalikan')
                ->visible(fn ($record) => $record->status === 'dipinjam')
                ->action(function ($record) {
                    $record->update(['status' => 'dikembalikan']);
                }),

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
            'index' => Pages\ListPeminjaman::route('/'),
            'create' => Pages\CreatePeminjaman::route('/create'),
            'edit' => Pages\EditPeminjaman::route('/{record}/edit'),
        ];
    }
}
