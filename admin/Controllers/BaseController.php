<?php
ob_start();
class BaseController
{

   const VIEW_FOLDER_NAME = 'Views';
   const MODEL_FOLDER_NAME = 'Models';

   const VIEW_FOLDER_NAME_FRONTEND = 'admin/Views';
   const MODEL_FOLDER_NAME_FRONTEND = 'admin/Models';

   protected function view($path, array $data = [])
   {
      foreach ($data as $key => $value) {
         $$key = $value;
      }
      $viewPath = self::VIEW_FOLDER_NAME . '/' . str_replace('.', '/', $path) . '.php';
      require($viewPath);
   }

   protected function loadModel($modelPath)
   {
      require(self::MODEL_FOLDER_NAME . '/' . $modelPath . '.php');
   }

   protected function viewFrontEnd($path, array $data = [])
   {
      foreach ($data as $key => $value) {
         $$key = $value;
      }
      $viewPath = self::VIEW_FOLDER_NAME_FRONTEND . '/' . str_replace('.', '/', $path) . '.php';
      require($viewPath);
   }
   protected function loadModelFrontEnd($modelPath)
   {
      require(self::MODEL_FOLDER_NAME_FRONTEND . '/' . $modelPath . '.php');
   }
}
