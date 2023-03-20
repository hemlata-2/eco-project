<?php
   namespace App\Test;
   use App\User;

   class TestFacades{
      public static function testingFacades() {
         // return "Testing the Facades in Laravel.";
         $update = User::all();
         return $update;

      }
   }
?>