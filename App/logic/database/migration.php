<?php
    //auto load classes
    spl_autoload_register(function($name){
        require_once("./App/logic/classes/$name.class.php");
        
    });

    class DatabaseCreator{

        /**
         * Write the transaction that will create the tables in this function
         */
        public static function makeDatabase(){
            /**
             * Please make sure to set your database name in the .env file.
             */
            $conn = utility::makeConnection();

            try{
                $conn->beginTransaction();

                //Abart, please write the db creation statement in here. Make sure to add drop if exist or something to check if the table already exist if you only want to update it.

                //We reomoved the not null from on some columns
                $sql = "CREATE TABLE users 
                (
                	userId INT(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
                	firstname VARCHAR(20) ,
                	lastname VARCHAR(20) ,
                	phone VARCHAR(15) ,
                	email VARCHAR(255) NOT NULL,
                	password VARCHAR (256) NOT NULL,
                	preferredArticleTopics VARCHAR(255),
                	isSubscribed TINYINT default 0
                )";

                $stmt1 =  $conn->prepare($sql);
                $stmt1->execute();

                $sql = "CREATE TABLE ArticleTopics
                (

                aTopicId INT(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
                topic VARCHAR (255),
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
                
                $stmt2 =  $conn->prepare($sql);
                $stmt2->execute();

                //I already made some updates
                $sql = "CREATE TABLE Article
                (
                	articleId INT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
                	writerId INT(20) UNSIGNED NOT NULL,
                    title VARCHAR(500),
                    subtitle VARCHAR(500),
                	body TEXT,
                	publishStatus enum('published', 'draft'),
                	shares INT DEFAULT 0,
                    featured_image VARCHAR(1000), 
                	created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                	published_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                	FOREIGN KEY (writerId) REFERENCES users(userId)

                )";

                $stmt3 =  $conn->prepare($sql);
                $stmt3->execute();

                $sql = "CREATE TABLE ArticleReaction 
                (
                	aReactionId INT(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
                	articleId INT (20) UNSIGNED,
                	applaudedBy INT(20) UNSIGNED,
                	FOREIGN KEY (applaudedBy) REFERENCES users(userId),
                	FOREIGN KEY (articleId) REFERENCES Article(articleId)

                )";

                $stmt4 =  $conn->prepare($sql);
                $stmt4->execute();

                $sql = "CREATE TABLE Reading
                (
                	readingId INT(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
                	readerId INT(20) UNSIGNED,
                	FOREIGN KEY (readerId) REFERENCES users(userId),
                	articleId INT(20) UNSIGNED, timeReading INT,  
                	FOREIGN KEY (articleId) REFERENCES Article(articleId)


                )";
                
                $sql = "CREATE TABLE ArticleTags 
                (
                tagRefId INT(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
                articleId INT(20) UNSIGNED,
                tagId INT(20) UNSIGNED,

                FOREIGN KEY (tagId) REFERENCES ArticleTopics(aTopicId),
                FOREIGN KEY (articleId) REFERENCES Article(articleId)
		        )";
		
                $stmt5 =  $conn->prepare($sql);
                $stmt5->execute();

		$sql = "CREATE TABLE ArticleKeywords
		(
		        keywordId INT(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
		        articleId INT(20) UNSIGNED,
		        keywords TEXT,
		        is_indexed INT DEFAULT 0, 
		        FOREIGN KEY (articleId) REFERENCES Article(articleId)
		 )";
          
                $stmt6 =  $conn->prepare($sql);
                $stmt6->execute();
		    
		 $sql = "CREATE TABLE Index
		(
			termId INT(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
			term VARCHAR(255),
			docfreq INT UNSIGNED
		)";
          
                $stmt7 =  $conn->prepare($sql);
                $stmt7->execute();

 		$sql = "CREATE TABLE temporaryImage
		(
			tmpImgId INT(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
			imagePath TEXT,
			created_at DATETIME DEFAULT CURRENT_TIMESTAMP
		)";
          
                $stmt8 =  $conn->prepare($sql);
                $stmt8->execute();
		
		    
		    
		   
                


                $conn->commit();
            }
            catch(Exception $e){
                echo $e->getMessage();
                $conn->rollBack();
            }

        }
    }

    DatabaseCreator::makeDatabase();

?>
