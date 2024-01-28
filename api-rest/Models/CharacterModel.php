<?php

    class CharacterModel extends Mysql
    {

        public function __construct()
        {
            parent::__construct();
        }

        public function GetAllCharacters(): array
        {

            $sql = 'SELECT c.id, c.name_character, c.description
                    FROM characters c
                    GROUP BY c.id
                    ORDER BY c.id desc
                    ';

            $request = $this->Select($sql);
            return $request;
        }

        public function GetCharacterById(int $characterId): array
        {
            $sql = 'SELECT c.id, c.name_character, c.description
                    FROM characters c
                    WHERE c.id = "'.$characterId.'"
                    ';

            $request = $this->Select($sql);
            return $request;
        }

        public function InsertCharacter(string $name_character, string $description)
        {
            $query_insert= "INSERT INTO characters(name_character, description)
            VALUES(:name, :desc)";

            $arrayData = array(":name" => $name_character,
                        ":desc" => $description,
                    );

            $request_insert = $this->Insert($query_insert, $arrayData);
        }

        public function UpdateCharacter(int $characterId, string $name_character, string $description)
        {
            $sql = "UPDATE characters SET name_character = :nam, description = :desc
            WHERE id = :id ";
            $arrData = array(
                ":nam" => $name_character,
                ":desc" => $description,
                ":id" => $characterId
            );
            $request = $this->Update($sql, $arrData);
            return $request;
        }

        public function DeleteCharacter(int $characterId): bool
        {
            $this->intIdCharacter = $characterId;
            $sql = "DELETE FROM characters WHERE id = :id ";
            $arrData = array(":id" => $this->intIdCharacter);
            $request = $this->Delete($sql, $arrData);
            return $request;
        }

    }

?>