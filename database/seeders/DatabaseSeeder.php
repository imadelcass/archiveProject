<?php

namespace Database\Seeders;

use App\Models\Archive;
use App\Models\Beneficiaire;
use App\Models\Cellule;
use App\Models\Dossier;
use App\Models\Piece;
use App\Models\Ranger;
use App\Models\Service;
use App\Models\TypeDossier;
use App\Models\TypePiece;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Archive::create([
            'codeArchive' => 'l1',
            'intitulArchive' => 'local 1',
        ]);
        Archive::create([
            'codeArchive' => 'l2',
            'intitulArchive' => 'local 2',
        ]);
        Service::create([
            'codeService' => 's1',
            'libService' => 'service 1',
        ]);
        Service::create([
            'codeService' => 's2',
            'libService' => 'service 2',
        ]);
        Beneficiaire::create([
            'CODEBENEFICIAIRE' => 'b1',
            'NOMBENEFICIAIRE' => 'benef 1',
            'RUE' => 'rue',
            'VILLE' => 'agadir',
            'CP' => '86150',
            'EMAIL' => 'benef1@gmail.com',
            'TEL' => '0587965498',
            'CONTACT' => '0587965498',
            'GSM' => '0587965498',
        ]);
        Beneficiaire::create([
            'CODEBENEFICIAIRE' => 'b2',
            'NOMBENEFICIAIRE' => 'benef 2',
            'RUE' => 'rue',
            'VILLE' => 'casa',
            'CP' => '86150',
            'EMAIL' => 'benef2@gmail.com',
            'TEL' => '0587965498',
            'CONTACT' => '0587965498',
            'GSM' => '0587965498',
        ]);
        Ranger::create([
            'codeRanger' => 'r1',
            'intitulRanger' => 'ranger 1',
            'idArchive' => 1,
            'nbrLignes' => 1,
            'nbrColonnes' => 1,
        ]);
        Cellule::create([
            'codeCellule' => 'r1-1-1',
            'idRanger' => 1,
            'numLigne' => 1,
            'numColonne' => 1,
        ]);

        TypeDossier::create([
            'codeTypeDoss' => 'typeDoss1',
            'libTypeDoss' => 'type doss 1',
        ]);
        Dossier::create([
            'NUMDOSSIER' => 'doss1',
            'IDTYPEDOSSIER' => 1,
            'IDSERVICE' => 1,
            'IDBENEFICIAIRE' => 1,
            'DATEDOSSIER' => '2022-02-15',
            'idCellule' => 1,
            'AnneeDossier' => 2020,
            'ObjetDossier' => 'object dossier',
            'DISPODOSSIER' => 0,
            'VALID' => 0,
        ]);
        TypePiece::create([
            "codeTypePiece" => "tp1",
            "IntituleTypePiece" => "tp1",
        ]);
        TypePiece::create([
            "codeTypePiece" => "tp2",
            "IntituleTypePiece" => "tp2",
        ]);
        
        Piece::create([
            "numPiece" => "p1",
            "idTypePiece" => 1,
            "intitulePiece" => "piece 1",
            "idDossier" => 1,
            "file" => "1654339495.pdf",
        ]);
        Piece::create([
            "numPiece" => "p2",
            "idTypePiece" => 2,
            "intitulePiece" => "piece 2",
            "idDossier" => 1,
            "file" => "1654340347.pdf",
        ]);

        User::create([
            "name" => "user",
            "idService" => 1,
            "type" => "user",
            "email" => "user@mail.com",
            "password" => Hash::make("1234"),
        ]);
        User::create([
            "name" => "admin",
            "idService" => 1,
            "type" => "admin",
            "email" => "admin@mail.com",
            "password" => Hash::make("1234"),
        ]);
        User::create([
            "name" => "master",
            "idService" => 1,
            "type" => "master",
            "email" => "master@mail.com",
            "password" => Hash::make("1234"),
        ]);

    }
}

// INSERT INTO `users`(`name`, `email`, `password`)
//VALUES ('imad','imad@gmail.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi')
