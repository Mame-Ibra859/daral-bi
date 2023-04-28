<?php
namespace App\Database;
class Databaseclass
{
public $bdd;
public $msg=[];
public $table;
public $argument;
public $params;
public $resultFetchBdd;
public $argumentUpdate;
public $paramsUpdate;
public $mergeArray;



public function __construct($bdd)
{
    return  $this->bdd=$bdd;
}

/**
 * Method SqlRequestPrepare est une requete preparé 
 *
 * @param $table $table [table de la requete ]
 * @param array $argument [les arguments de la requete exemple:['id','nom']]
 * @param array $params [les donnees à injecter sur la methode execute exemple:['1','malick']]
 *
 * @return void
 */
public function SqlRequestPrepare($table,array $argument,array $params)
{
    $this->table=$table;
    $this->argument=$argument;
    $this->params=$params;
    
    for ($i=0; $i <count($this->argument) ; $i++) { 
        $this->argument[$i]=$this->argument[$i].'=? ';
    }
    $this->argument=implode("and ",$this->argument);
    $request=$this->bdd->prepare("SELECT * FROM {$this->table} where {$this->argument}");
    $request->execute($params);
    $resultFetchSelect= $request->rowCount()>0;
    if($resultFetchSelect):
        $this->resultFetchBdd=$request->fetchAll();
        $this->msg=[1,'Article trouver'];
    else:
        $this->msg=[0,'Article non trouver'];
    endif;
    return $resultFetchSelect;
    
}




//query request
/**
 * Method SqlRequestQuery
 *
 * @param $table $table [explicite description]
 * @param $argument=null $argument [explicite description]
 *
 * @return void
 */
public function SqlRequestQuery($table,$argument=null)
{
    $this->table=$table;
    $this->argument=$argument;
    $request=$this->bdd->query("SELECT * FROM $this->table $this->argument");
    $resultRequest=$request->fetchAll();
    return $resultRequest;
}






/**
 * Method SqlRequestUpdate
 *
 * @param $table $table [table de la requete ]
 * @param array $argument [les arguments de la requete exemple:[['colonne'=>'ce qui est remplacé']]
 * @param array $params [les donnees à injecter sur la methode execute exemple:[['id'=>91]]
 * exemple $dump=$databeClass->SqlRequestUpdate('produits',['Prix_Du_Produit'=>'9999'],['id'=>91]);
 * @return void
 */
public function SqlRequestUpdate($table,array $argument,array $params)
{
    $this->table=$table;
    $this->params=$params;
    $this->argument=$argument;
    $this->paramsUpdate=$params;
    $this->argumentUpdate=$argument;
    $datakeyArgument=[];
    $datavalueArgument=[];
    $datakeyParams=[];
    $datavalueParams=[];

    foreach ($this->argument as $columnArgument => $dataArgument) {
        $datakeyArgument[].=$columnArgument.'=?';
        $datavalueArgument[].= $dataArgument;
        
    }
    foreach ($this->params as $columnParams => $dataParams) {
        $datakeyParams[].=$columnParams.'=?';
        $datavalueParams[].= $dataParams;
    }
    $this->argument=implode(", ",$datakeyArgument);
    $this->params=implode(" and ",$datakeyParams);
    $this->mergeArray=array_merge($datavalueArgument,$datavalueParams);
    $request=$this->bdd->prepare("UPDATE `$this->table` set {$this->argument} where {$this->params}");
    if($request->execute($this->mergeArray)):
    $this->msg=[0,'Article mis à jour'];
    else:
    $this->msg=[0,'N\'a pas pu etre mis à jour'];
    endif;
}




//delete request
public function SqlRequestDelete($table,array $argument,array $params)
{
    $this->table=$table;
    $this->argument=$argument;
    $this->params=$params;
    $verifExist=new Databaseclass($this->bdd);
        if($verifExist->SqlRequestPrepare($this->table,$this->argument,$this->params)):
        for ($i=0; $i <count($this->argument) ; $i++){ 
            $this->argument[$i]=$this->argument[$i].'=? ';
        }
        $this->argument=implode("and ",$this->argument);
        $request=$this->bdd->prepare("DELETE FROM $this->table where $this->argument");
        $request->execute($this->params);
        $this->msg=[1,'Article supprimer'];
    else:
        $this->msg=[0,'Aucun Article supprimé'];
    endif;
}





}