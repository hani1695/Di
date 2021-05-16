<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class FicheExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('t_fiches_dommages')
        ->select('code_fiche','date_fiche','wilaya','cod_inp_a','usage','evl_fin_gd','cod_inp_a','const_clc','const_cont',
        'usage','age_app','nb_niv','nb_join_el','nb_join_in','v_san','sou_sol','elem_ext_e','elem_ext_a','elem_ext_p',
        'faille','liquefa','affaisse_s','gliss',
        'fond_type','fon_dom_ta','fon_dom_gl','fon_dom_bs',
        'infr_voil','infr_po_re',
        'str_e_p_m','str_e_p_vb','val_in_a','str_e_p_mt','str_e_p_b','str_e_p_au',
        'el_ctv_m_m','el_ctv_v_b','el_ctv_p_b','el_ctv_p_m','el_ctv_pa_',
        'plan_tr__1','plan_tr_s_','plan_tr_b',
        't_in_c_m','t_in_c_b','t_in_cv_t','t_in_cv_am','t_in_cv_me',
        'el_s_es_be','el_s_es_m','el_s_es_b','el_s_r_m','el_s_r_bt','el_s_r_ba','el_s_r_au',
        'el_s_in_p','el_s_in_c','el_s_in_v','el_s_ex_b','el_s_ex_ga','el_s_ex_av','el_s_ex_ac','el_s_ex_ch','el_s_ex_au',
        'if_c_a_m_c','if_c_a_emc','if_c_a_spc','el_s_ex_av',
        'victime','nb_victime',
        'com_st_sp','com_st_re','com_st_rf','com_sl_sp','com_sl_re','com_sl_rf',
        'autre_com','evl_fin_gd','mesure_imm')
        ->get();
    }
    public function headings(): array
    {
        return [
            ['code fiche',
            'date',
            'wilaya',
            'code inspecteur',
            'usage',
            'évaluation',
            'code inspecteur' ,
            'Construction calculee au seisme',
            'Construction controle', 

            'usage', 
            'Age approximatif',
            ' Nombre de niveaux',
            ' Nombre de joints de dilatation -en elevation',
            ' Nombre de joints de dilatation - Infrastructure',
            ' Vide sanitaire',
            ' Sous-sol',

            ' Element exterieurs Indepandants Escaliers',
            ' Element exterieurs Indepandants Auvent',
            ' Element exterieurs Indepandants Passage Couvert',

            'Probleme de sol autour de la construction Faille', 
            'Probleme de sol autour de la construction Liquefaction', 
            'Probleme de sol autour de la construction Affaissement/soulevement', 
            'Probleme de sol autour de la construction Glissement', 

            'Fondations Type de fondation ',
            'Fondations Type de dommages tassement uniforme ',
            'Fondations Type de dommages glissement ',
            'Fondations Type de dommages Basculement ',

            'Infrastructure voile beton continu',
            'Infrastructure poteaux beton avec remplissage',

            'Element porteurs murs en marçonnerie',
            'Element porteurs voile beton',
            'Element porteurs poteau beton',
            'Element porteurs poteau metaliques',
            'Element porteurs poteau bois',
            'Element porteurs autre',

            'Element de contreventement murs en marçonnerie',
            'Element de contreventement voile beton',
            'Element de contreventement portique beton arme',
            'Element de contreventement portique metaliques',
            'Element de contreventement palees triangulees',
            'Element de contreventement autre',

            'plachers -toiture terrasse beton arme',
            'plachers -toiture terrasse silive metaliques',
            'plachers -toiture terrasse solive bois',

            'Toiture inclinee charpente metalique',
            'Toiture inclinee charpente bois',
            'Toiture inclinee couverture tuile',
            'Toiture inclinee couverture aminate ciment',
            'Toiture inclinee couverture metalique',

            'Escaliers beton',
            'Escaliers metal',
            'Escaliers bois',
            'Remplissages extereurs marçonnerie',
            'Remplissages extereurs beton prefabrique',
            'Remplissages extereurs bardages',
            'Remplissages extereurs autre',
 
            'autre elements intereurs plafonds',
            'autre elements intereurs cloisons',
            'autre elements intereurs elements vitres',
            'Elements extereurs balcons ',
            'Elements extereurs garde- corps',
            'Elements extereurs auvent',
            'Elements extereurs Acrotères – Corniches',
            'Elements extereurs Cheminées',
            'Elements extereurs Autre',

            'La consturction menace une autre construction',
            'La construction est menacee par une autre construction',
            'la construction peut etre soutien par une autre construction',
            'la construction peut etre soutenue part une autre construction',

            'victimes ',
            'nombre des victimes ',

            'Sens transversal symetrie en plan',
            'Sens transversal regularite en elevation',
            'Sens transversal redondances des files',
            'Sens longitudinal symetrie en plan',
            'Sens longitudinal regularite en elevation',
            'Sens longitudinal redondances des files',

            'autre commentaire ',
            'Niveau general des dommages ',
            'mesure immediates a prendre ',],
            ['code fiche',
            'date',
            'wilaya',
            'code inspecteur',
            'usage',
            'évaluation',
            'code inspecteur' ,
            'Construction calculee au seisme',
            'Construction controle', 

            'usage', 
            'Age approximatif',
            ' Nombre de niveaux',
            ' Nombre de joints de dilatation -en elevation',
            ' Nombre de joints de dilatation - Infrastructure',
            ' Vide sanitaire',
            ' Sous-sol',

            ' Element exterieurs Indepandants Escaliers',
            ' Element exterieurs Indepandants Auvent',
            ' Element exterieurs Indepandants Passage Couvert',

            'Probleme de sol autour de la construction Faille', 
            'Probleme de sol autour de la construction Liquefaction', 
            'Probleme de sol autour de la construction Affaissement/soulevement', 
            'Probleme de sol autour de la construction Glissement', 

            'Fondations Type de fondation ',
            'Fondations Type de dommages tassement uniforme ',
            'Fondations Type de dommages glissement ',
            'Fondations Type de dommages Basculement ',

            'Infrastructure voile beton continu',
            'Infrastructure poteaux beton avec remplissage',

            'Element porteurs murs en marçonnerie',
            'Element porteurs voile beton',
            'Element porteurs poteau beton',
            'Element porteurs poteau metaliques',
            'Element porteurs poteau bois',
            'Element porteurs autre',

            'Element de contreventement murs en marçonnerie',
            'Element de contreventement voile beton',
            'Element de contreventement portique beton arme',
            'Element de contreventement portique metaliques',
            'Element de contreventement palees triangulees',
            'Element de contreventement autre',

            'plachers -toiture terrasse beton arme',
            'plachers -toiture terrasse silive metaliques',
            'plachers -toiture terrasse solive bois',

            'Toiture inclinee charpente metalique',
            'Toiture inclinee charpente bois',
            'Toiture inclinee couverture tuile',
            'Toiture inclinee couverture aminate ciment',
            'Toiture inclinee couverture metalique',

            'Escaliers beton',
            'Escaliers metal',
            'Escaliers bois',
            'Remplissages extereurs marçonnerie',
            'Remplissages extereurs beton prefabrique',
            'Remplissages extereurs bardages',
            'Remplissages extereurs autre',
 
            'autre elements intereurs plafonds',
            'autre elements intereurs cloisons',
            'autre elements intereurs elements vitres',
            'Elements extereurs balcons ',
            'Elements extereurs garde- corps',
            'Elements extereurs auvent',
            'Elements extereurs Acrotères – Corniches',
            'Elements extereurs Cheminées',
            'Elements extereurs Autre',

            'La consturction menace une autre construction',
            'La construction est menacee par une autre construction',
            'la construction peut etre soutien par une autre construction',
            'la construction peut etre soutenue part une autre construction',

            'victimes ',
            'nombre des victimes ',

            'Sens transversal symetrie en plan',
            'Sens transversal regularite en elevation',
            'Sens transversal redondances des files',
            'Sens longitudinal symetrie en plan',
            'Sens longitudinal regularite en elevation',
            'Sens longitudinal redondances des files',

            'autre commentaire ',
            'Niveau general des dommages ',
            'mesure immediates a prendre ',]
        ];
    }
}
