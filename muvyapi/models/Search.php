<?php
    class Searchs {
        // DB stuff
        private $conn;
        private $seriesTable        = 'series';
        private $singleTable        = 'singles';
        private $seasonNoTable      = 'seasonNo';
        private $charactersTable        = 'characters';
        private $subtitleTable      = 'subtitle';
        private $discriptionTable   = 'discription';

        //  create properties
        public $item;
        // public $category;
        // public $coverPic;
        // public $language;
        // public $subtitle;
        // public $movieFile;
        // public $characters;
        // public $discription;
        // public $noOfEpisodes;
        // public $seasonNo;

        // constructor with DB
        public function __construct($db){
            $this->conn = $db;
        }

        // get single movies
        public function getSingleMovies() {
            $query = 'SELECT 
                    sm.id, 
                    sm.movieName,
                    sm.language,
                    sm.category, 
                    sm.movieFile,
                    sm.createdAt,
                    sm.coverPic,
                    a.characters as characters,
                    s.subtitle as subtitle,
                    d.discription as discription
                FROM 
                    singles sm
                LEFT JOIN 
                    characters a ON sm.movieName = a.movieName
                LEFT JOIN 
                    subtitle s ON sm.movieName = s.movieName
                LEFT JOIN 
                    discription d ON sm.movieName = d.movieName
                WHERE 
                    sm.movieName like "%":item"%"
                ORDER BY sm.createdAt DESC';
            
            // prepare statement
            $stmt = $this->conn->prepare($query);

            // bind data ie :something
            $stmt->bindParam(':item', $this->item);

            // Execute
            $stmt->execute();

            return $stmt;
        }



        // get series movies
        public function getSeriesMovies() {
            $query = 'SELECT 
                    sm.id, 
                    sm.movieName,
                    sm.language,
                    sm.category, 
                    sm.movieFile,
                    sm.createdAt,
                    sm.coverPic,
                    n.seasonNo as seasonNumber,
                    a.characters as characters,
                    s.subtitle as subtitle,
                    d.discription as discription
                FROM 
                    series sm
                LEFT JOIN 
                    seasonNo n ON sm.movieName = n.movieName    
                LEFT JOIN 
                    characters a ON sm.movieName = a.movieName
                LEFT JOIN 
                    subtitle s ON sm.movieName = s.movieName
                LEFT JOIN 
                    discription d ON sm.movieName = d.movieName
                WHERE 
                    sm.movieName like "%":item"%"
                ORDER BY sm.createdAt DESC';
            
            // prepare statement
            $stmt = $this->conn->prepare($query);

            // bind data ie :something
            $stmt->bindParam(':item', $this->item);

            // bind data ie :something
            $stmt->bindParam(':item', $this->item);

            // Execute
            $stmt->execute();

            return $stmt;
        }



        // get discription
        public function getDiscription() {
            $query = 'SELECT 
                    d.id, 
                    d.movieName,
                    d.discription,
                    d.createdAt
                FROM 
                    discription d
                WHERE 
                    d.movieName like "%":item"%"
                ORDER BY d.createdAt DESC';
            
            // prepare statement
            $stmt = $this->conn->prepare($query);

            // bind data ie :something
            $stmt->bindParam(':item', $this->item);

            // Execute
            $stmt->execute();

            return $stmt;
        }


        // get subtitle
        public function getSubtitle() {
            $query = 'SELECT 
                    d.id, 
                    d.movieName,
                    d.Subtitle,
                    d.createdAt
                FROM 
                    Subtitle d
                WHERE 
                    d.movieName like "%":item"%"
                ORDER BY d.createdAt DESC';
            
            // prepare statement
            $stmt = $this->conn->prepare($query);

            // bind data ie :something
            $stmt->bindParam(':item', $this->item);

            // Execute
            $stmt->execute();

            return $stmt;
        }


        // get series number
        public function getseasonNo() {
            $query = 'SELECT 
                    d.id, 
                    d.movieName,
                    d.seasonNo,
                    d.createdAt
                FROM 
                    seasonNo d
                WHERE 
                    d.movieName like "%":item"%"
                ORDER BY d.createdAt DESC';
            
            // prepare statement
            $stmt = $this->conn->prepare($query);

            // bind data ie :something
            $stmt->bindParam(':item', $this->item);

            // Execute
            $stmt->execute();

            return $stmt;
        }


        // get characters
        public function getcharacters() {
            $query = 'SELECT 
                    d.id, 
                    d.movieName,
                    d.characters,
                    d.createdAt
                FROM 
                    characters d
                WHERE 
                    d.movieName like "%":item"%"
                ORDER BY d.createdAt DESC';
            
            // prepare statement
            $stmt = $this->conn->prepare($query);

            // bind data ie :something
            $stmt->bindParam(':item', $this->item);

            // Execute
            $stmt->execute();

            return $stmt;
        }
    }
?>
