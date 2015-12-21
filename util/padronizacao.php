<?php
class Padronizacao{
    
    public static function criptografar($v){
        return md5('Lhaos'+$v+' mantendo sua conta segura');
    }

}//fecha padronizacao