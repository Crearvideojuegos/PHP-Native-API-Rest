<?php

    class Mysql extends Connection
    {
        private $connection;
		private $strquery;
		private $arrValues;

        public function __construct()
		{
			$this->connection = new Connection();
			$this->connection = $this->connection->connect();
		}

        public function Select(string $query)
		{
            try {
                $this->strquery = $query;
                $execute = $this->connection->query($this->strquery);
                $request = $execute->fetchall(PDO::FETCH_ASSOC); //ARRAY
                $execute->closeCursor();
                return $request;
            } catch (Exception $e) {
                $response = "Error: ". $e->getMessage();
                return $response;
            }
        }

		public function Insert(string $query, array $arrValues)
		{
            try {
                $this->strquery = $query;
                $this->arrValues = $arrValues;
                $insert = $this->connection->prepare($this->strquery);
                $resInsert = $insert->execute($this->arrValues);
                $idInsert = $this->connection->lastInsertId();
                $insert->closeCursor();
                return $idInsert;
            } catch (Exception $e) {
                $response = "Error: ". $e->getMessage();
                return $response;
            }
        }

        public function Update(string $query, array $arrValues)
		{
            try {
                $this->strquery = $query;
                $this->arrValues = $arrValues;
                $update = $this->connection->prepare($this->strquery);
                $resUdpate = $update->execute($this->arrValues);
                $update->closeCursor();
                return $resUdpate;
            } catch (Exception $e) {
                $response = "Error: ". $e->getMessage();
                return $response;
            }
        }

        public function Delete(string $query, array $arrValues)
		{
            try {
                $this->strquery = $query;
                $this->arrValues = $arrValues;
                $delete = $this->connection->prepare($this->strquery);
                $del = $delete->execute($this->arrValues); 
                return $del;
            } catch (Exception $e) {
                $response = "Error: ". $e->getMessage();
                return $response;
            }
        }
        
    }

?>