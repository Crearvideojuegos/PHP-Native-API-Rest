<?php

    class Character extends Controllers
    {

        public function __construct()
        {
            parent::__construct();
        }

        public function GetCharacters(): void
        {
            try {

                $method = $_SERVER['REQUEST_METHOD'];
                $response = [];
                
                if($method == "GET")
                {

                    $arrayCharacters = $this->model->GetAllCharacters();

                    if(empty($arrayCharacters))
                    {
                        $response = array('status' => false , 'msg' => 'Not found');

                    } else {
                        $response = array('status' => true , 'msg' => 'Found Data', 'data' => $arrayCharacters);
                    }

                    $code = 200;                    
                } else {
                    $response = array('status' => false , 'msg' => 'Error en la solicitud '.$method);
                    $code = 400;
                }

                JsonResponse($response, $code);
                die();

            } catch (Exception $e) {
                echo "Error: ". $e->getMessage();
            }

            die();
        }

        public function GetCharacterById(int $characterId): void
        {
            try {

                $method = $_SERVER['REQUEST_METHOD'];
                $response = [];
                
                if($method == "GET")
                {
                    if(empty($characterId) or !is_numeric($characterId))
                    {
                        $response = array('status' => false , 'msg' => 'Error in parameter');
                        $code = 400;
                        JsonResponse($response, $code);
                        die();
                    }

                    $arrayCharacters = $this->model->GetCharacterById($characterId);

                    if(empty($arrayCharacters))
                    {
                        $response = array('status' => false , 'msg' => 'Not found');

                    } else {
                        $response = array('status' => true , 'msg' => 'Found Data', 'data' => $arrayCharacters);
                    }

                    $code = 200;                    
                } else {
                    $response = array('status' => false , 'msg' => 'Error '.$method);
                    $code = 400;
                }

                JsonResponse($response, $code);
                die();

            } catch (Exception $e) {
                echo "Error: ". $e->getMessage();
            }

            die();
        }

        public function InsertCharacter(): void
        {
           try {
                $method = $_SERVER['REQUEST_METHOD'];
                $response = [];

                if($method == "POST")
                {
                    $_POST = json_decode(file_get_contents('php://input'), true);


                    $name_character = strClean($_POST['name_character']);
                    $description = strClean($_POST['description']);

                   
                    $request = $this->model->InsertCharacter($name_character,
                                                            $description);
                    
                    $response = array('status' => true , 'msg' => 'Save Data', 'data' => $request);
                    $code = 201;                                  


                } else {
                    $response = array('status' => false , 'msg' => 'Error in Method '.$method);
                    $code = 400;
                }
                
                JsonResponse($response, $code);
                die();

           } catch (Exception $e) {
                echo "Error: ". $e->getMessage();
           }
           die();
        }

        public function UpdateCharacter($characterId): void
        {
            try 
            {
                $method = $_SERVER['REQUEST_METHOD'];
                $response = [];
                if($method == "PUT")
                {
                    $data = json_decode(file_get_contents('php://input'), true);
                    if(empty($characterId) or !is_numeric($characterId))
                    {
                        $response = array('status' => false , 'msg' => 'Error in parameter');
                        $code = 400;
                        jsonResponse($response, $code);
                        die();
                    }

                    $name_character = strClean($data['name_character']);
                    $description = strClean($data['description']);

                    $request = $this->model->UpdateCharacter($characterId, $name_character, $description);

                    $response = array('status' => true , 'msg' => 'Save Data');
                    $code = 201;     
                } else {
                    $response = array('status' => false , 'msg' => 'Error '.$method);
                    $code = 400;
                }
            } catch (Exception $e) {
                echo "Error: ". $e->getMessage();
            }
            die();
        }

        public function DeleteCharacter(int $characterId): void
        {
            try 
            {
                $method = $_SERVER['REQUEST_METHOD'];
                $response = [];
                if($method == "DELETE")
                {
                    if(empty($characterId) or !is_numeric($characterId))
                    {
                        $response = array('status' => false, 'msg' => 'Error');
                        JsonResponse($response, 400);
                        die();
                    }

                    $request = $this->model->DeleteCharacter($characterId);

                    if($request)
                    {
                        $response = array('status' => true , 'msg' => 'Character deleted');
                        $code = 200; 
                    } else {
                        $response = array('status' => false , 'msg' => 'Is not possible delete the caracter');
                        $code = 400; 
                    }
                    
                    jsonResponse($response, $code);

                } else {
                    $response = array('status' => false , 'msg' => 'Error '.$method);
                    $code = 400;
                }
                
                die();

            } catch (Exception $e) {
                echo "Error: ". $e->getMessage();
            }
            die();
        }

    }


?>