<?php

namespace App;

use App\Models\StokBahanBaku;
trait UpdatesStock
{
    public static function bootUpdatesStock()
    {
        static::created(function ($model) {
            $stock = StokBahanBaku::where('KodeJenisBahanBaku', $model->KodeJenisBahanBaku)->first();
            
            if ($stock) {
                switch (class_basename($model)) {
                    case 'Pembelian':
                        $stock->JumlahBahanBaku += $model->JumlahPembelian;
                        break;
                    case 'Pemakaian':
                        $stock->JumlahBahanBaku -= $model->JumlahPemakaian;
                        break;
                    case 'Retur':
                        $stock->JumlahBahanBaku -= $model->JumlahBahanBaku;
                        break;
                }
                $stock->save();
            }
        });

        static::updated(function ($model) {
            $stock = StokBahanBaku::where('KodeJenisBahanBaku', $model->KodeJenisBahanBaku)->first();
            
            if ($stock) {
                switch (class_basename($model)) {
                    case 'Pembelian':
                        $stock->JumlahBahanBaku = $stock->JumlahBahanBaku - $model->getOriginal('JumlahPembelian') + $model->JumlahPembelian;
                        break;
                    case 'Pemakaian':
                        $stock->JumlahBahanBaku = $stock->JumlahBahanBaku + $model->getOriginal('JumlahPemakaian') - $model->JumlahPemakaian;
                        break;
                    case 'Retur':
                        $stock->JumlahBahanBaku = $stock->JumlahBahanBaku + $model->getOriginal('JumlahBahanBaku') - $model->JumlahBahanBaku;
                        break;
                }
                $stock->save();
            }
        });

        static::deleted(function ($model) {
            $stock = StokBahanBaku::where('KodeJenisBahanBaku', $model->KodeJenisBahanBaku)->first();
            
            if ($stock) {
                switch (class_basename($model)) {
                    case 'Pembelian':
                        $stock->JumlahBahanBaku -= $model->JumlahPembelian;
                        break;
                    case 'Pemakaian':
                        $stock->JumlahBahanBaku += $model->JumlahPemakaian;
                        break;
                    case 'Retur':
                        $stock->JumlahBahanBaku += $model->JumlahBahanBaku;
                        break;
                }
                $stock->save();
            }
        });
    }
}