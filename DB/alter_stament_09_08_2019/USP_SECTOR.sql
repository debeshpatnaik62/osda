CREATE  PROCEDURE `USP_SECTOR`(

     IN  P_ACTION          VARCHAR(3),

     IN  P_SECTOR_ID       INT,

     IN  P_SECTOR_NAME     VARCHAR(128),

     IN  P_SECTOR_NAME_O   TEXT CHARSET utf8,

     IN  P_SECTOR_ALIAS    VARCHAR(128),

     IN  P_IMAGE           VARCHAR(128),

     IN  P_DESCRIPTION     TEXT,

     IN  P_DESCRIPTION_O   TEXT CHARSET utf8,

     IN  P_PUB_STATUS      TINYINT,

     IN  P_CREATED_BY      INT,
     
     IN  P_MAPPING_CODE    VARCHAR(16)
)
BEGIN

   

   

	/*DECLARE EXIT HANDLER FOR SQLEXCEPTION

		BEGIN

		ROLLBACK;

        SELECT 'An error has occurred, operation rollbacked and the stored procedure was terminated';

	END; */                


		  IF(P_ACTION='AU')THEN

          

              START TRANSACTION;

				IF(P_SECTOR_ID>0)THEN

                

					SET @DUP_CTR 	  = (SELECT COUNT(1) FROM t_sector WHERE bitDeletedFlag=0 AND vchSecotrName=P_SECTOR_NAME AND intSectorId!= P_SECTOR_ID);

                    

                    SET @DUP_CTR_ALIAS = (SELECT COUNT(1) FROM t_sector WHERE bitDeletedFlag=0 AND vchSecotrAlias=P_SECTOR_ALIAS AND intSectorId!= P_SECTOR_ID);

                    

					IF(@DUP_CTR =0 && @DUP_CTR_ALIAS =0)THEN            

						UPDATE t_sector SET vchSecotrName = P_SECTOR_NAME,vchSecotrNameO = P_SECTOR_NAME_O,vchSecotrAlias = P_SECTOR_ALIAS,vchImage= P_IMAGE,vchDescription = P_DESCRIPTION,vchDescriptionO= P_DESCRIPTION_O,intUpdatedBy=P_CREATED_BY,tinPublishStatus=P_PUB_STATUS,vchSectormapCOde=P_MAPPING_CODE WHERE intSectorId = P_SECTOR_ID;                

						SET @P_STATUS	= P_SECTOR_ID;

					ELSE

						SET @P_STATUS	= 0;

				   END IF;   

				ELSE

				  SET @DUP_CTR = (SELECT COUNT(1) FROM t_sector WHERE bitDeletedFlag=0 AND vchSecotrName=P_SECTOR_NAME );	

				  SET @DUP_CTR_ALIAS = (SELECT COUNT(1) FROM t_sector WHERE bitDeletedFlag=0 AND vchSecotrAlias=P_SECTOR_ALIAS);

                    

				  IF(@DUP_CTR =0 && @DUP_CTR_ALIAS =0)THEN  

					INSERT INTO t_sector(vchSecotrName, vchSecotrNameO,vchSecotrAlias,vchImage, vchDescription, vchDescriptionO, intCreatedBy,tinPublishStatus,vchSectormapCOde)VALUES (P_SECTOR_NAME,P_SECTOR_NAME_O,P_SECTOR_ALIAS,P_IMAGE,P_DESCRIPTION,P_DESCRIPTION_O,P_CREATED_BY,P_PUB_STATUS,P_MAPPING_CODE);

							   

					SET @P_STATUS	= LAST_INSERT_ID();         

				  ELSE

					SET @P_STATUS	= 0;

				  END IF;            

				END IF;  

			 COMMIT;	

			 SELECT  @P_STATUS;   

		  END IF;

          



	  IF(P_ACTION='R')THEN

		SELECT intSectorId,vchSecotrName, vchSecotrNameO,vchSecotrAlias,vchImage, vchDescription, vchDescriptionO,tinPublishStatus,intShowHome,stmCreatedOn,vchSectormapCOde FROM t_sector WHERE intSectorId=P_SECTOR_ID;

	  END IF;

     

     

     IF(P_ACTION='RA')THEN

		SELECT intSectorId,vchSecotrName, vchSecotrNameO,vchSecotrAlias,vchImage, vchDescription, vchDescriptionO,tinPublishStatus,intShowHome,stmCreatedOn,vchSectormapCOde FROM t_sector WHERE vchSecotrAlias=P_SECTOR_ALIAS;

	  END IF; 



  IF(P_ACTION='V') THEN



      SET @P_SQL='SELECT intSectorId,vchSecotrName, vchSecotrNameO,vchSecotrAlias,vchImage, vchDescription,vchDescriptionO,tinPublishStatus,intShowHome,stmCreatedOn,vchSectormapCOde FROM t_sector WHERE bitDeletedflag=0 ';



      IF(P_PUB_STATUS>0)THEN

         SET @P_SQL=CONCAT(@P_SQL,' AND tinPublishStatus=',P_PUB_STATUS);

      END IF;



     IF(CHAR_LENGTH(P_SECTOR_NAME)>0)THEN

		SET @P_SQL	= CONCAT(@P_SQL,' AND vchSecotrName LIKE "%',P_SECTOR_NAME,'%"');

	 END IF;

     

     SET @P_SQL=CONCAT(@P_SQL,' ORDER BY stmCreatedOn DESC ');

    PREPARE STMT FROM @P_SQL;

    EXECUTE STMT;

    END IF;







    IF(P_ACTION='PG') THEN



      SET @START_REC=P_SECTOR_ID;



      SET @P_SQL='SELECT intSectorId,vchSecotrName, vchSecotrNameO,vchSecotrAlias,vchImage, vchDescription, vchDescriptionO,tinPublishStatus,intShowHome,stmCreatedOn,vchSectormapCOde FROM t_sector WHERE bitDeletedflag=0 ';



      IF(P_PUB_STATUS>0)THEN

         SET @P_SQL=CONCAT(@P_SQL,' AND tinPublishStatus=',P_PUB_STATUS);

      END IF;



      IF(CHAR_LENGTH(P_SECTOR_NAME)>0)THEN

		SET @P_SQL	= CONCAT(@P_SQL,' AND vchSecotrName LIKE "%',P_SECTOR_NAME,'%"');

	  END IF;

     

      SET @P_SQL=CONCAT(@P_SQL,' ORDER BY stmCreatedOn DESC LIMIT ?,20');

      PREPARE STMT FROM @P_SQL;

      EXECUTE STMT USING @START_REC;

    END IF;



 



  IF(P_ACTION='IN')THEN

    UPDATE t_sector SET tinPublishStatus=1,intShowHome=0,intUpdatedBy=P_CREATED_BY,dtmUpdatedOn=NOW() WHERE intSectorId=P_SECTOR_ID;

    SELECT 'Sector details Unpublish Successfully';

  END IF;

  

  IF(P_ACTION='AC')THEN

    UPDATE t_sector SET tinPublishStatus=2,intUpdatedBy=P_CREATED_BY,dtmUpdatedOn=NOW() WHERE intSectorId=P_SECTOR_ID;

    SELECT 'Sector details Activated Successfully';

  END IF;



  IF(P_ACTION='D')THEN

  

    IF((SELECT COUNT(1) FROM t_course_details WHERE bitDeletedFlag=0 AND intCategoryId=P_SECTOR_ID)=0)THEN

	  UPDATE t_sector SET bitDeletedflag=1 WHERE intSectorId=P_SECTOR_ID;

       select 0;

    ELSE

      SELECT 1;

    END IF;

    

  END IF;

  



	 IF(P_ACTION='HH')THEN

		 UPDATE t_sector SET intShowHome=0,intUpdatedBy=P_CREATED_BY WHERE intSectorId=P_SECTOR_ID;

		 SELECT 'Sector detail(s) Hide on home page Successfully';

	END IF;

	   

    IF(P_ACTION='SH')THEN

		 UPDATE t_sector SET intShowHome=1,intUpdatedBy=P_CREATED_BY WHERE intSectorId=P_SECTOR_ID;

		 SELECT 'Sector detail published on home page  Successfully';

    END IF;

     

	 	

	  IF(P_ACTION='RH')THEN

		SET @P_SQL  = "SELECT intSectorId, vchSecotrName, vchSecotrNameO,vchSecotrAlias,vchImage,(select count(1) from t_course_details ts where ts.bitDeletedFlag=0 and ts.intCategoryId = intSectorId and tinPublishStatus = 2 )AS intCoursecount FROM t_sector WHERE bitDeletedflag=0 AND intShowHome=1 AND intSectorId IN (SELECT intCategoryId FROM t_course_details TC WHERE TC.bitDeletedFlag=0 AND TC.tinPublishStatus=2) ";

        

          IF(P_PUB_STATUS>0)THEN

			 SET @P_SQL=CONCAT(@P_SQL,' AND tinPublishStatus=',P_PUB_STATUS);

		  END IF;

          

        SET @P_SQL=CONCAT(@P_SQL,' ORDER BY vchSecotrName ASC ');

		PREPARE STMT FROM @P_SQL;

		EXECUTE STMT;

	  END IF;

      

      

      IF(P_ACTION='F') THEN



		  SET @P_SQL='SELECT intSectorId,vchSecotrName, vchSecotrNameO,vchSecotrAlias,vchImage, vchDescription,vchDescriptionO,tinPublishStatus,intShowHome,stmCreatedOn FROM t_sector WHERE bitDeletedflag=0 ';



		  IF(P_PUB_STATUS>0)THEN

			 SET @P_SQL=CONCAT(@P_SQL,' AND tinPublishStatus=',P_PUB_STATUS);

		  END IF;



		 IF(CHAR_LENGTH(P_SECTOR_NAME)>0)THEN

			SET @P_SQL	= CONCAT(@P_SQL,' AND vchSecotrName LIKE "%',P_SECTOR_NAME,'%"');

		 END IF;

		 

		SET @P_SQL=CONCAT(@P_SQL,' ORDER BY vchSecotrName ASC ');

		PREPARE STMT FROM @P_SQL;

		EXECUTE STMT;

      END IF;



	

     IF(P_ACTION='WV') THEN



		  SET @P_SQL='SELECT TS.vchSecotrNameO as nameO, TS.vchSecotrName as name, TS.vchImage as image, TS.intSectorId as id,(SELECT COUNT(1) FROM t_course_details TCD WHERE TCD.intCategoryId = TS.intSectorId AND TCD.bitDeletedFlag=0 AND TCD.tinPublishStatus=2) AS total_course FROM t_sector AS TS WHERE TS.bitDeletedflag=0 AND TS.tinPublishStatus = 2 ';

		  

		  PREPARE STMT FROM @P_SQL;

		  EXECUTE STMT;



		END IF;
        
/*Action to insert Sector Data from API response NIC*/        
        
	IF(P_ACTION='ASD')THEN
			SET @P_STATUS	= 0;
                TRUNCATE t_sector_tmp;
                TRUNCATE t_course_temp;
               -- TRUNCATE t_institute_course_tmp;
			START TRANSACTION;
				
		SET @P_SQL=CONCAT('INSERT INTO `t_sector_tmp`(`vchSecotrName`,vchSectorCode,
`intCreatedBy`) VALUES ',P_DESCRIPTION);
-- select @P_SQL;
		 PREPARE STMT FROM @P_SQL;
		 EXECUTE STMT;
			 SET @Q_SQL=CONCAT('INSERT INTO t_course_temp(vchSectorId,vchCourseCode,vchCourseNameE,vchQualificationId,
	decDurationHr) VALUES', P_DESCRIPTION_O);
    -- select @Q_SQL;
				   PREPARE STMT1 FROM @Q_SQL;
				   EXECUTE STMT1;


			SET @P_STATUS	= LAST_INSERT_ID();
			COMMIT;	

		SELECT  @P_STATUS;   

	END IF;
 
 /*Action to get Sectors mapped from temporary table*/
    
    IF(P_ACTION='SMD') THEN



      SET @P_SQL='SELECT intSectorId,vchSecotrName, vchSectorCode from t_sector_tmp WHERE bitDeletedflag=0 ';


     SET @P_SQL=CONCAT(@P_SQL,' ORDER BY vchSecotrName ');

    PREPARE STMT FROM @P_SQL;

    EXECUTE STMT;

    END IF;



END