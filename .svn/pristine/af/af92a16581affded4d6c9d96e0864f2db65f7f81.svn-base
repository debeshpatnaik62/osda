CREATE  PROCEDURE `USP_COURSE_DETAILS`(

		  IN  P_ACTION      	VARCHAR(3),

		  IN  P_COURSE_ID  		INT,

          IN  P_SECTOR_ID  		INT,

		  IN  P_COURSE_NAME  	VARCHAR(128),

          IN  P_COURSE_NAME_O  	VARCHAR(500) CHARSET utf8,

		  IN  P_COURSE_ALIAS   	VARCHAR(128),

		  IN  P_DURATION    	DECIMAL(3,1),

          IN  P_ELIGIBILITY   	INT,

          IN  P_DETAILS   		TEXT,

		  IN  P_DETAILS_O    	TEXT CHARSET utf8,

          IN  P_PUB_STATUS      TINYINT(3),

		  IN  P_ARC_STATUS      TINYINT(3),

		  IN  P_CREATED_BY  	INT,

          IN  P_PAGE_SIZE  	    INT,

          IN  P_SEARCH    	    TEXT,

          IN  P_DURATION_HOUR   DECIMAL(10,1),

          IN  P_COURSE_TYPE 	INT(1),
          
          IN P_MAPPING_CODE		VARCHAR(200)

		)
BEGIN		

	  

		/*DECLARE EXIT HANDLER FOR SQLEXCEPTION

			BEGIN

			ROLLBACK;

			SELECT 'An error has occurred, operation rollbacked and the stored procedure was terminated';

		END;*/                   

	

      

		  IF(P_ACTION='AU')THEN

          

              START TRANSACTION;

				IF(P_COURSE_ID>0)THEN

					SET @DUP_CTR = (SELECT COUNT(1) FROM t_course_details WHERE bitDeletedFlag=0 AND vchCourseNameE=P_COURSE_NAME AND intCourseId!= P_COURSE_ID);

                    SET @DUP_CTR2 = (SELECT COUNT(1) FROM t_course_details WHERE bitDeletedFlag=0 AND vchCourseAlias=P_COURSE_ALIAS AND intCourseId!= P_COURSE_ID);

                    

					IF(@DUP_CTR =0 &&  @DUP_CTR2=0)THEN            

						UPDATE t_course_details SET intCategoryId = P_SECTOR_ID,vchCourseNameE = P_COURSE_NAME,vchCourseNameO = P_COURSE_NAME_O,intCourseType = P_COURSE_TYPE,vchCourseAlias =P_COURSE_ALIAS,intDuration= P_DURATION,decDurationHr=P_DURATION_HOUR,vchDescriptionE = P_DETAILS,vchDescriptionO= P_DETAILS_O,intEligibility= P_ELIGIBILITY,intUpdatedBy=P_CREATED_BY,vchCourseMapId=P_MAPPING_CODE WHERE intCourseId = P_COURSE_ID;                

						SET @P_STATUS	= P_COURSE_ID;

					ELSE

						SET @P_STATUS	= 0;

				   END IF;   

				ELSE

				  SET @DUP_CTR = (SELECT COUNT(1) FROM t_course_details WHERE bitDeletedFlag=0 AND vchCourseNameE=P_COURSE_NAME );	

                  SET @DUP_CTR2 = (SELECT COUNT(1) FROM t_course_details WHERE bitDeletedFlag=0 AND vchCourseAlias=P_COURSE_ALIAS);

                    

				 IF(@DUP_CTR =0 &&  @DUP_CTR2=0)THEN 

					INSERT INTO t_course_details(intCategoryId,vchCourseNameE, vchCourseNameO, intCourseType,vchCourseAlias, intDuration,decDurationHr, vchDescriptionE, vchDescriptionO, intEligibility,stmCreatedOn, intCreatedBy,vchCourseMapId)VALUES (P_SECTOR_ID,P_COURSE_NAME,P_COURSE_NAME_O,P_COURSE_TYPE,P_COURSE_ALIAS,P_DURATION,P_DURATION_HOUR,P_DETAILS,P_DETAILS_O,P_ELIGIBILITY,NOW(),P_CREATED_BY,P_MAPPING_CODE);

							   

					SET @P_STATUS	= LAST_INSERT_ID();         

				  ELSE

					SET @P_STATUS	= 0;

				  END IF;            

				END IF;  

			 COMMIT;	

			 SELECT  @P_STATUS;   

		  END IF;

          

		

		  

		  IF(P_ACTION='V')THEN

			SET @P_SQL='SELECT intCourseId, intCategoryId,intCourseType,intCategoryId as intSectorId,(select vchSecotrName from t_sector ts where ts.bitDeletedflag=0 and ts.intSectorId=intCategoryId)as vchSecotrName,(select vchSecotrNameO from t_sector ts where ts.bitDeletedflag=0 and ts.intSectorId=intCategoryId)as vchSecotrNameO,(select vchImage from t_sector ts where ts.bitDeletedflag=0 and ts.intSectorId=intCategoryId)as vchImage, vchCourseNameE, vchCourseNameO,vchCourseAlias, intDuration,decDurationHr, vchDescriptionE, vchDescriptionO, intEligibility,(select vchQualification from m_qualification mq where mq.bitDeletedflag=0 and mq.intQualifyValue=intEligibility)as vchQualification,(select vchQualificationO from m_qualification mq where mq.bitDeletedflag=0 and mq.intQualifyValue=intEligibility)as vchQualificationO,(SELECT count(1) FROM t_institute_course where t_course_details.bitDeletedFlag = 0 and  t_course_details.tinPublishStatus = 2 and t_institute_course.intCourseId = t_course_details.intCourseId) AS skill_count,stmCreatedOn,intCreatedBy,tinPublishStatus,tinArcStatus,intShowHome,vchCourseMapId FROM t_course_details WHERE bitDeletedFlag=0 ';			

				                

                IF(P_PUB_STATUS>0)THEN

				  SET @P_SQL=CONCAT(@P_SQL,' AND tinPublishStatus=',P_PUB_STATUS);

				END IF; 

                

                 IF(P_SECTOR_ID>0)THEN

				  SET @P_SQL=CONCAT(@P_SQL,' AND intCategoryId=',P_SECTOR_ID);

				 END IF;

                 

                 IF(CHAR_LENGTH(P_COURSE_NAME)>0)THEN

						SET @P_SQL	= CONCAT(@P_SQL,' AND (vchCourseNameE LIKE "%',P_COURSE_NAME,'%" OR vchCourseNameO LIKE "%',P_COURSE_NAME,'%") ');

			     END IF;

                 

                 IF(CHAR_LENGTH(P_COURSE_ALIAS)>0)THEN

					SET @P_SQL	= CONCAT(@P_SQL,' AND vchCourseAlias ="',P_COURSE_ALIAS,'" ');

				 END IF;

                 

                   IF(CHAR_LENGTH(P_COURSE_NAME_O)>0)THEN

						SET @P_SQL	= CONCAT(@P_SQL,' AND (intCategoryId IN (',P_COURSE_NAME_O,'))');

					END IF;

                  

				IF(CHAR_LENGTH(P_DETAILS)>0)THEN

						SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility IN (',P_DETAILS,') ');

			    END IF;

                  

				IF(CHAR_LENGTH(P_DETAILS_O)>0)THEN

						SET @P_SQL	= CONCAT(@P_SQL,P_DETAILS_O);

			    END IF;

                 

               IF(P_ELIGIBILITY>0)THEN

                 IF(P_ELIGIBILITY<10)THEN

				   SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility<=',P_ELIGIBILITY);

                 ELSE  

					SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility=',P_ELIGIBILITY);

			  END IF; 

			  END IF; 

		    SET @P_SQL=CONCAT(@P_SQL,' AND tinArcStatus = ',P_ARC_STATUS,' ORDER BY stmCreatedOn DESC,vchCourseNameE');

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;		

		  END IF;

		 

         

		

		IF(P_ACTION='PG') THEN

			SET @START_REC	= P_COURSE_ID;

			SET @P_SQL='SELECT TC.intCourseId, intCategoryId,intCourseType,(select vchImage from t_sector ts where ts.bitDeletedflag=0 and ts.intSectorId=intCategoryId)as vchSectorImage,(select vchSecotrName from t_sector ts where ts.bitDeletedflag=0 and ts.intSectorId=intCategoryId)as vchSecotrName,(select vchSecotrNameO from t_sector ts where ts.bitDeletedflag=0 and ts.intSectorId=intCategoryId)as vchSecotrNameO, vchCourseNameE, vchCourseNameO,vchCourseAlias, intDuration, decDurationHr,vchDescriptionE, vchDescriptionO, intEligibility,(select vchQualification from m_qualification mq where mq.bitDeletedflag=0 and mq.intQualifyValue=intEligibility)as vchQualification,(select vchQualificationO from m_qualification mq where mq.bitDeletedflag=0 and mq.intQualifyValue=intEligibility)as vchQualificationO,stmCreatedOn,intCreatedBy,tinPublishStatus,tinArcStatus,intShowHome,(select count(1) from t_institute_course TI where TI.bitDeletedflag=0 and TC.intCourseId=TI.intCourseId and TI.intInstituteId in (select intInstituteId from t_institute_details where bitDeletedFlag=0 and tinIsPIA IN(1,2)  and tinPublishStatus=2))as intOfferedBy,(select count(1) from t_institute_course TI where TI.bitDeletedflag=0 and TC.intCourseId=TI.intCourseId and TI.intInstituteId in (select intInstituteId from t_institute_details where bitDeletedFlag=0 and tinIsPIA=3 and tinPublishStatus=2))as intOfferedPIABy,vchCourseMapId FROM t_course_details TC  where TC.bitDeletedFlag=0 ';	 

            

            

            

			  IF(P_PUB_STATUS>0)THEN

				  SET @P_SQL = CONCAT(@P_SQL,' AND tinPublishStatus=',P_PUB_STATUS);

			  END IF;    

              

              IF(P_SECTOR_ID>0)THEN

				SET @P_SQL=CONCAT(@P_SQL,' AND intCategoryId=',P_SECTOR_ID);

			  END IF; 

              

              IF(CHAR_LENGTH(P_COURSE_NAME)>0)THEN

					SET @P_SQL	= CONCAT(@P_SQL,' AND (vchCourseNameE LIKE "%',P_COURSE_NAME,'%" OR vchCourseNameO LIKE "%',P_COURSE_NAME,'%") ');

			  END IF;

                 

			  IF(CHAR_LENGTH(P_COURSE_ALIAS)>0)THEN

				 SET @P_SQL	= CONCAT(@P_SQL,' AND vchCourseAlias ="',P_COURSE_ALIAS,'" ');

			  END IF; 

              

              

                   IF(CHAR_LENGTH(P_COURSE_NAME_O)>0)THEN

						SET @P_SQL	= CONCAT(@P_SQL,' AND (intCategoryId IN (',P_COURSE_NAME_O,')) ');

					END IF;

                 

				IF(CHAR_LENGTH(P_DETAILS)>0)THEN

                   IF(FIND_IN_SET('9',P_DETAILS)>0 )THEN

				       SET @P_SQL	= CONCAT(@P_SQL,' AND (intEligibility < 10 OR intEligibility IN (',P_DETAILS,')) ');

                    ELSE 

                      SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility IN (',P_DETAILS,')');

				  END IF; 			

                   

			    END IF;  

                  

				IF(CHAR_LENGTH(P_DETAILS_O)>0)THEN

						SET @P_SQL	= CONCAT(@P_SQL,P_DETAILS_O);

			    END IF;

               IF(P_ELIGIBILITY>0)THEN

                 IF(P_ELIGIBILITY<10)THEN

				   SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility<=',P_ELIGIBILITY);

                 ELSE  

					SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility=',P_ELIGIBILITY);

			  END IF; 

			  END IF; 

			 SET @P_SQL = CONCAT(@P_SQL,' AND tinArcStatus = ',P_ARC_STATUS,' ORDER BY stmCreatedOn DESC,vchCourseNameE LIMIT ?,',P_PAGE_SIZE);

             

			 PREPARE STMT FROM @P_SQL;

			EXECUTE STMT USING @START_REC;

	   END IF;

            

		

		  

		

	   IF(P_ACTION='CT')THEN

			SET @P_SQL  = 'SELECT count(1) AS COUNT FROM t_course_details WHERE bitDeletedFlag=0 ';

		

			 IF(P_PUB_STATUS>0)THEN

				  SET @P_SQL = CONCAT(@P_SQL,' AND tinPublishStatus=',P_PUB_STATUS);

			  END IF;  

              

              IF(P_SECTOR_ID>0)THEN

				SET @P_SQL=CONCAT(@P_SQL,' AND intCategoryId=',P_SECTOR_ID);

			  END IF; 

              

               IF(P_CREATED_BY>0)THEN

				SET @P_SQL=CONCAT(@P_SQL,' AND intCourseId=',P_CREATED_BY);

			  END IF; 

              

              

              IF(CHAR_LENGTH(P_COURSE_NAME)>0)THEN

						SET @P_SQL	= CONCAT(@P_SQL,' AND (vchCourseNameE LIKE "%',P_COURSE_NAME,'%" OR vchCourseNameO LIKE "%',P_COURSE_NAME,'%") ');

			   END IF;

               

			  IF(CHAR_LENGTH(P_COURSE_ALIAS)>0)THEN

				 SET @P_SQL	= CONCAT(@P_SQL,' AND vchCourseAlias ="',P_COURSE_ALIAS,'" ');

			  END IF;   

           

                   IF(CHAR_LENGTH(P_COURSE_NAME_O)>0)THEN

						SET @P_SQL	= CONCAT(@P_SQL,' AND (intCategoryId IN (',P_COURSE_NAME_O,')) ');

					END IF;

			 

				IF(CHAR_LENGTH(P_DETAILS)>0)THEN

                   IF(FIND_IN_SET('9',P_DETAILS)>0 )THEN

				       SET @P_SQL	= CONCAT(@P_SQL,' AND (intEligibility < 10 OR intEligibility IN (',P_DETAILS,') ) ');

                    ELSE 

                      SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility IN (',P_DETAILS,')');

				  END IF; 			

                   

			    END IF;  

			  

				IF(CHAR_LENGTH(P_DETAILS_O)>0)THEN

						SET @P_SQL	= CONCAT(@P_SQL,P_DETAILS_O);

			    END IF;

                    

			 IF(P_ELIGIBILITY>0)THEN

                 IF(P_ELIGIBILITY<10)THEN

				   SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility<=',P_ELIGIBILITY);

                 ELSE  

					SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility=',P_ELIGIBILITY);

			 END IF; 

			 END IF; 

		    SET @P_SQL = CONCAT(@P_SQL,' AND tinArcStatus = ',P_ARC_STATUS);  

           

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;		

	   END IF;

	 

		

	  IF(P_ACTION='D')THEN	

		

			IF((SELECT COUNT(1) FROM t_institute_course WHERE bitDeletedflag= 0 AND intCourseId = P_COURSE_ID)=0)THEN

			  UPDATE t_course_details SET bitDeletedFlag=1,intUpdatedBy = P_CREATED_BY WHERE intCourseId = P_COURSE_ID ;		

			  SELECT 0;

			ELSE

			  SELECT 1;

		  END IF;

		 

	  END IF;

			

	  IF(P_ACTION='R') THEN		

		SELECT intCourseId,intCategoryId,intCourseType, vchCourseNameE, vchCourseNameO,vchCourseAlias, intDuration,decDurationHr, vchDescriptionE, vchDescriptionO, intEligibility,stmCreatedOn, intCreatedBy,tinPublishStatus,tinArcStatus,intShowHome,vchCourseMapId FROM t_course_details WHERE bitDeletedFlag=0 AND intCourseId = P_COURSE_ID ;		

	  END IF;	

      

       IF(P_ACTION='RA') THEN		

		SELECT intCourseId,intCategoryId, intCourseType,vchCourseNameE, vchCourseNameO,vchCourseAlias, intDuration,decDurationHr, vchDescriptionE, vchDescriptionO, intEligibility,stmCreatedOn, intCreatedBy,tinPublishStatus,tinArcStatus,intShowHome,vchCourseMapId FROM t_course_details WHERE bitDeletedFlag=0 AND vchCourseAlias = P_COURSE_ALIAS ;		

	  END IF;	

	 

	  IF(P_ACTION='IN')THEN

		UPDATE t_course_details SET tinPublishStatus=1,intUpdatedBy=P_CREATED_BY WHERE intCourseId = P_COURSE_ID ;		

		SELECT 'Course details Inactivated Successfully';

	  END IF;

	  IF(P_ACTION='AC')THEN

		UPDATE t_course_details SET tinPublishStatus=1,tinArcStatus=0,intUpdatedBy=P_CREATED_BY WHERE intCourseId = P_COURSE_ID;		

		SELECT 'Course details Activated Successfully';

	  END IF;

	  

	  IF(P_ACTION='P')THEN

		UPDATE t_course_details SET tinPublishStatus=2,tinArcStatus=0,intUpdatedBy=P_CREATED_BY WHERE intCourseId = P_COURSE_ID;		

		SELECT 'Course details published Successfully';

	  END IF;

	  

	  IF(P_ACTION='AR')THEN

		UPDATE t_course_details SET tinArcStatus=1,tinPublishStatus=1,intUpdatedBy=P_CREATED_BY WHERE intCourseId = P_COURSE_ID;		

		SELECT 'Course details archieved Successfully';

	  END IF;

	

		 

	   IF(P_ACTION='HH')THEN

		 UPDATE t_course_details SET intShowHome=0,intUpdatedBy=P_CREATED_BY WHERE intCourseId = P_COURSE_ID;		

		 SELECT 'Course detail(s) Hide on home page Successfully';

	   END IF;

	   

	   IF(P_ACTION='SH')THEN

		 UPDATE t_course_details SET intShowHome=1,intUpdatedBy=P_CREATED_BY WHERE intCourseId = P_COURSE_ID;		

		 SELECT 'Course detail published on home page  Successfully';

	   END IF;

     

     

      

      IF(P_ACTION='RQ') THEN		

			SELECT intQualifyid, intQualifyValue, vchQualification, vchQualificationO FROM m_qualification WHERE bitDeletedflag=0 ;		

	  END IF;	

     

      

        

		

	   IF(P_ACTION='CTC')THEN

			SET @P_SQL  = 'SELECT count(1) AS totCount FROM (

SELECT count(1) AS courseCount,intCategoryId,(select vchSecotrName from t_sector ts where ts.bitDeletedflag=0 and ts.intSectorId=intCategoryId)as vchSecotrName FROM t_course_details TC WHERE bitDeletedFlag=0 AND tinPublishStatus=2  ';

			

              IF(CHAR_LENGTH(P_COURSE_NAME)>0)THEN

				SET @P_SQL	= CONCAT(@P_SQL,' AND (vchCourseNameE LIKE "%',P_COURSE_NAME,'%" OR TC.intCategoryId IN (SELECT intSectorId FROM t_sector TS WHERE TS.bitDeletedflag=0 AND TS.tinPublishStatus=2 AND TS.vchSecotrName LIKE "%',P_COURSE_NAME,'%" ))');

			 END IF;

             

			IF(P_ELIGIBILITY>0)THEN

                 IF(P_ELIGIBILITY<10)THEN

				   SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility<=',P_ELIGIBILITY);

                 ELSE  

					SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility=',P_ELIGIBILITY);

			 END IF; 

			 END IF;

          

		    SET @P_SQL = CONCAT(@P_SQL,' group by intCategoryId )TBL WHERE 1 ');

          

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;	

            

	   END IF;

         

		

	   IF(P_ACTION='PGC')THEN

            SET @START_REC	= P_COURSE_ID;

			SET @P_SQL  	= 'SELECT * FROM (

SELECT count(1) AS courseCount,intCategoryId,(select vchSecotrName from t_sector ts where ts.bitDeletedflag=0 and ts.intSectorId=intCategoryId)as vchSecotrName,(select vchSecotrNameO from t_sector ts where ts.bitDeletedflag=0 and ts.intSectorId=intCategoryId)as vchSecotrNameO,(select vchSecotrAlias from t_sector ts where ts.bitDeletedflag=0 and ts.intSectorId=intCategoryId)as vchSecotrAlias,(select vchImage from t_sector ts where ts.bitDeletedflag=0 and ts.intSectorId=intCategoryId)as vchImage FROM t_course_details TC WHERE bitDeletedFlag=0 AND tinPublishStatus=2   ';

			

		     IF(CHAR_LENGTH(P_COURSE_NAME)>0)THEN

				SET @P_SQL	= CONCAT(@P_SQL,' AND (vchCourseNameE LIKE "%',P_COURSE_NAME,'%" OR TC.intCategoryId IN (SELECT intSectorId FROM t_sector TS WHERE TS.bitDeletedflag=0 AND TS.tinPublishStatus=2 AND TS.vchSecotrName LIKE "%',P_COURSE_NAME,'%" )) ');

			 END IF;

            

			IF(P_ELIGIBILITY>0)THEN

				IF(P_ELIGIBILITY<10)THEN

				   SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility<=',P_ELIGIBILITY);

                 ELSE  

					SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility=',P_ELIGIBILITY);

				END IF; 

			 END IF; 

             

              

			   IF(CHAR_LENGTH(P_SEARCH)>0)THEN

					SET @P_SQL	= CONCAT(@P_SQL,' ',P_SEARCH,' ');

				END IF;

                    

          

			IF(P_DURATION>0)THEN

				IF(P_DURATION<12)THEN

				   SET @P_SQL	= CONCAT(@P_SQL,' AND intDuration<=',P_DURATION);

                 ELSE  

					SET @P_SQL	= CONCAT(@P_SQL,' AND intDuration>=',P_DURATION);

				END IF; 

			 END IF;

             

		    SET @P_SQL 		= CONCAT(@P_SQL,' group by intCategoryId )TBL WHERE 1 ');  

            SET @P_SQL 		= CONCAT(@P_SQL,' ORDER BY vchSecotrName ASC ');            

           

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT ;

            

	   END IF;

       

       

		

		  IF(P_ACTION='VCG')THEN

			SET @P_SQL='SELECT intCourseId, intCategoryId,(select vchSecotrAlias from t_sector ts where ts.bitDeletedflag=0 and ts.intSectorId=intCategoryId)as vchSecotrAlias,vchCourseNameE, vchCourseNameO,vchCourseAlias, intDuration,decDurationHr, vchDescriptionE, vchDescriptionO, intEligibility,(select vchQualification from m_qualification mq where mq.bitDeletedflag=0 and mq.intQualifyValue=intEligibility)as vchQualification,(select vchQualificationO from m_qualification mq where mq.bitDeletedflag=0 and mq.intQualifyValue=intEligibility)as vchQualificationO,stmCreatedOn,intShowHome FROM t_course_details WHERE bitDeletedFlag=0 ';			

				                

                IF(P_PUB_STATUS>0)THEN

				  SET @P_SQL=CONCAT(@P_SQL,' AND tinPublishStatus=',P_PUB_STATUS);

				END IF; 

                

				IF(P_SECTOR_ID>0)THEN

				  SET @P_SQL=CONCAT(@P_SQL,' AND intCategoryId=',P_SECTOR_ID);

				END IF;

                 

                IF(P_ELIGIBILITY>0)THEN

                 IF(P_ELIGIBILITY<10)THEN

				   SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility<=',P_ELIGIBILITY);

                 ELSE  

					SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility=',P_ELIGIBILITY);

			   END IF; 

               END IF; 

		    SET @P_SQL=CONCAT(@P_SQL,' AND tinArcStatus = ',P_ARC_STATUS,' ORDER BY intEligibility ASC ');

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;		

		  END IF;

          

          

          IF(P_ACTION='GDE')THEN

			SET @P_SQL=CONCAT('SELECT GROUP_CONCAT(DISTINCT(intEligibility))AS allEligibility FROM t_course_details WHERE bitDeletedFlag=0 AND tinPublishStatus=2 ');

                

                IF(P_DURATION>0)THEN

					IF(P_DURATION<12)THEN

					   SET @P_SQL	= CONCAT(@P_SQL,' AND intDuration<=',P_DURATION);

					 ELSE  

						SET @P_SQL	= CONCAT(@P_SQL,' AND intDuration>=',P_DURATION);

					END IF; 

				 END IF;

                 

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;		   

          END IF;

          

          

          

          IF(P_ACTION='PGF') THEN

			SET @START_REC	= P_COURSE_ID;

			SET @P_SQL='SELECT TC.intCourseId, intCategoryId,(select vchImage from t_sector ts where ts.bitDeletedflag=0 and ts.intSectorId=intCategoryId)as vchSectorImage,(select vchSecotrName from t_sector ts where ts.bitDeletedflag=0 and ts.intSectorId=intCategoryId)as vchSecotrName,(select vchSecotrNameO from t_sector ts where ts.bitDeletedflag=0 and ts.intSectorId=intCategoryId)as vchSecotrNameO, vchCourseNameE, vchCourseNameO,vchCourseAlias, intDuration, decDurationHr,vchDescriptionE, vchDescriptionO, intEligibility,(select vchQualification from m_qualification mq where mq.bitDeletedflag=0 and mq.intQualifyValue=intEligibility)as vchQualification,(select vchQualificationO from m_qualification mq where mq.bitDeletedflag=0 and mq.intQualifyValue=intEligibility)as vchQualificationO,stmCreatedOn,intCreatedBy,tinPublishStatus,tinArcStatus,intShowHome,(select count(1) from t_institute_course TI where TI.bitDeletedflag=0 and TC.intCourseId=TI.intCourseId and TI.intInstituteId in (select intInstituteId from t_institute_details where bitDeletedFlag=0 and tinIsPIA IN(1,2)  and tinPublishStatus=2))as intOfferedBy,(select count(1) from t_institute_course TI where TI.bitDeletedflag=0 and TC.intCourseId=TI.intCourseId and TI.intInstituteId in (select intInstituteId from t_institute_details where bitDeletedFlag=0 and tinIsPIA=3 and tinPublishStatus=2))as intOfferedPIABy FROM t_course_details TC  where TC.bitDeletedFlag=0 ';	 

            

            

            

			  IF(P_PUB_STATUS>0)THEN

				  SET @P_SQL = CONCAT(@P_SQL,' AND tinPublishStatus=',P_PUB_STATUS);

			  END IF;    

              

              IF(P_SECTOR_ID>0)THEN

				SET @P_SQL=CONCAT(@P_SQL,' AND intCategoryId=',P_SECTOR_ID);

			  END IF; 

              

              IF(P_CREATED_BY>0)THEN

				SET @P_SQL=CONCAT(@P_SQL,' AND TC.intCourseId=',P_CREATED_BY);

			  END IF; 

              

              IF(CHAR_LENGTH(P_COURSE_NAME)>0)THEN

					SET @P_SQL	= CONCAT(@P_SQL,' AND (vchCourseNameE LIKE "%',P_COURSE_NAME,'%" OR vchCourseNameO LIKE "%',P_COURSE_NAME,'%") ');

			  END IF;

                 

			  IF(CHAR_LENGTH(P_COURSE_ALIAS)>0)THEN

				 SET @P_SQL	= CONCAT(@P_SQL,' AND vchCourseAlias ="',P_COURSE_ALIAS,'" ');

			  END IF; 

              

              

                   IF(CHAR_LENGTH(P_COURSE_NAME_O)>0)THEN

						SET @P_SQL	= CONCAT(@P_SQL,' AND (intCategoryId IN (',P_COURSE_NAME_O,')) ');

					END IF;

                 

				IF(CHAR_LENGTH(P_DETAILS)>0)THEN

                   IF(FIND_IN_SET('9',P_DETAILS)>0 )THEN

				       SET @P_SQL	= CONCAT(@P_SQL,' AND (intEligibility < 10 OR intEligibility IN (',P_DETAILS,')) ');

                    ELSE 

                      SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility IN (',P_DETAILS,')');

				  END IF; 			

                   

			    END IF;  

                  

				IF(CHAR_LENGTH(P_DETAILS_O)>0)THEN

						SET @P_SQL	= CONCAT(@P_SQL,P_DETAILS_O);

			    END IF;

               IF(P_ELIGIBILITY>0)THEN

                 IF(P_ELIGIBILITY<10)THEN

				   SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility<=',P_ELIGIBILITY);

                 ELSE  

					SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility=',P_ELIGIBILITY);

			  END IF; 

			  END IF; 

			 SET @P_SQL = CONCAT(@P_SQL,' AND tinArcStatus = ',P_ARC_STATUS,' ORDER BY vchCourseNameE,stmCreatedOn DESC LIMIT ?,',P_PAGE_SIZE);

             

			 PREPARE STMT FROM @P_SQL;

			EXECUTE STMT USING @START_REC;

	   END IF;

       

       

       

       

       IF(P_ACTION='FS')THEN

		



       SET @P_SQL = 'SELECT count(*) as skill_count FROM t_institute_course 

inner join (SELECT intInstituteId,intDistrictId,(select vchDistrictname from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as 

					vchDistrictname,(select vchDistrictnameO from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictnameO, 

					vchInstituteName, vchInstituteNameO, tinInstituteType, intEstYear,vchInstituteAlias, vchEmailId, vchPhoneno, vchWebsite, vchImage, vchDescriptionE, 

					vchDescriptionO,vchAddress,txtAddressO,vchPrincipalName,vchPrincipalNameO,td.stmCreatedOn,td.intCreatedBy,tinPublishStatus,tinArcStatus,vchMobileNo, 

					tinIsPIA ,vchPinCode,fltLat,fltLong FROM t_institute_details td WHERE td.bitDeletedFlag=0 and tinPublishStatus=2 and tinIsPIA=1 and tinArcStatus=0

				union all

					SELECT intInstituteId,intDistrictId,(select vchDistrictname from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as 

					vchDistrictname,(select vchDistrictnameO from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictnameO, 

					vchInstituteName, vchInstituteNameO, tinInstituteType, intEstYear,vchInstituteAlias, vchEmailId, vchPhoneno, vchWebsite, vchImage, vchDescriptionE, 

					vchDescriptionO,vchAddress,txtAddressO,vchPrincipalName,vchPrincipalNameO,td.stmCreatedOn,td.intCreatedBy,tinPublishStatus,tinArcStatus,vchMobileNo, 

					tinIsPIA ,vchPinCode,fltLat,fltLong FROM t_institute_details td WHERE td.bitDeletedFlag=0 and tinPublishStatus=2 and tinIsPIA=2 and tinArcStatus=0

				union all

					SELECT intInstituteId,intDistrictId,(select vchDistrictname from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as 

					vchDistrictname,(select vchDistrictnameO from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictnameO, 

					vchInstituteName, vchInstituteNameO, tinInstituteType, intEstYear,vchInstituteAlias, vchEmailId, vchPhoneno, vchWebsite, vchImage, vchDescriptionE, 

					vchDescriptionO,vchAddress,txtAddressO,vchPrincipalName,vchPrincipalNameO,td.stmCreatedOn,td.intCreatedBy,tinPublishStatus,tinArcStatus,vchMobileNo, 

					tinIsPIA ,vchPinCode,fltLat,fltLong FROM t_institute_details td,t_institute_pia b WHERE td.bitDeletedFlag=0 and tinPublishStatus=2 and tinIsPIA=3 and tinArcStatus=0

					and b.intInstdetailsId=td.intInstituteId) x on x.intInstituteId = t_institute_course.intInstituteId

inner join t_course_details on t_course_details.intCourseId = t_institute_course.intCourseId

where  t_course_details.bitDeletedFlag = 0 and t_course_details.tinPublishStatus = 2 and t_course_details.intCourseId = '; 



       SET @P_SQL = CONCAT(@P_SQL, P_COURSE_ID);

       

       
       

       PREPARE STMT FROM @P_SQL;

       EXECUTE STMT;

	  END IF;

      

      IF(P_ACTION='LL') THEN

           SET @P_SQL = CONCAT("SELECT COUNT(*) AS tot_lat_rec FROM t_institute_course INNER JOIN t_institute_details ON t_institute_details.intInstituteId = t_institute_course.intInstituteId WHERE t_institute_details.fltLat !='' AND t_institute_details.fltLong != '' AND t_institute_course.intCourseId = ", P_COURSE_ID);

           PREPARE STMT FROM @P_SQL;

           EXECUTE STMT;

       END IF;

       

       IF(P_ACTION='MV')THEN

			

            
            

            SET @P_SQL='SELECT intCourseId, intCategoryId,intCourseType,intCategoryId as intSectorId,(select vchSecotrName from t_sector ts where ts.bitDeletedflag=0 and ts.intSectorId=intCategoryId)as vchSecotrName,(select vchSecotrNameO from t_sector ts where ts.bitDeletedflag=0 and ts.intSectorId=intCategoryId)as vchSecotrNameO,(select vchImage from t_sector ts where ts.bitDeletedflag=0 and ts.intSectorId=intCategoryId)as vchImage, vchCourseNameE, vchCourseNameO,vchCourseAlias, intDuration,decDurationHr, vchDescriptionE, vchDescriptionO, intEligibility,(select vchQualification from m_qualification mq where mq.bitDeletedflag=0 and mq.intQualifyValue=intEligibility)as vchQualification,(select vchQualificationO from m_qualification mq where mq.bitDeletedflag=0 and mq.intQualifyValue=intEligibility)as vchQualificationO, (SELECT count(1) FROM t_institute_course z where intInstituteId in (SELECT intInstituteId FROM t_institute_details td WHERE td.bitDeletedFlag=0 and tinPublishStatus=2 and tinIsPIA in (1,2,3) and tinArcStatus=0) and  z.intCourseId = a.intCourseId) AS skill_count,(SELECT COUNT(1) FROM t_institute_course where intInstituteId in (SELECT intInstituteId FROM t_institute_details WHERE fltLat !='' AND fltLong != '' and bitDeletedFlag=0 and tinPublishStatus=2 and tinIsPIA in (1,2,3) and tinArcStatus=0)) AS tot_lat_rec, stmCreatedOn,intCreatedBy,tinPublishStatus,tinArcStatus,intShowHome FROM t_course_details a WHERE bitDeletedFlag=0  ';			

            

				                

                IF(P_PUB_STATUS>0)THEN

				  SET @P_SQL=CONCAT(@P_SQL,' AND tinPublishStatus=',P_PUB_STATUS);

				END IF; 

                

                 IF(P_SECTOR_ID>0)THEN

				  SET @P_SQL=CONCAT(@P_SQL,' AND intCategoryId=',P_SECTOR_ID);

				 END IF;

                 

                 IF(CHAR_LENGTH(P_COURSE_NAME)>0)THEN

						SET @P_SQL	= CONCAT(@P_SQL,' AND (vchCourseNameE LIKE "%',P_COURSE_NAME,'%" OR vchCourseNameO LIKE "%',P_COURSE_NAME,'%") ');

			     END IF;

                 

                 IF(CHAR_LENGTH(P_COURSE_ALIAS)>0)THEN

					SET @P_SQL	= CONCAT(@P_SQL,' AND vchCourseAlias ="',P_COURSE_ALIAS,'" ');

				 END IF;

                 

                   IF(CHAR_LENGTH(P_COURSE_NAME_O)>0)THEN

						SET @P_SQL	= CONCAT(@P_SQL,' AND (intCategoryId IN (',P_COURSE_NAME_O,'))');

					END IF;

                  

				IF(CHAR_LENGTH(P_DETAILS)>0)THEN

						SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility IN (',P_DETAILS,') ');

			    END IF;

                  

				IF(CHAR_LENGTH(P_DETAILS_O)>0)THEN

						SET @P_SQL	= CONCAT(@P_SQL,P_DETAILS_O);

			    END IF;

                 

               IF(P_ELIGIBILITY>0)THEN

                 IF(P_ELIGIBILITY<10)THEN

				   SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility<=',P_ELIGIBILITY);

                 ELSE  

					SET @P_SQL	= CONCAT(@P_SQL,' AND intEligibility=',P_ELIGIBILITY);

			  END IF; 

			  END IF; 

		    SET @P_SQL=CONCAT(@P_SQL,' AND tinArcStatus = ',P_ARC_STATUS,' ORDER BY vchCourseNameE,stmCreatedOn DESC ');

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;		

		  END IF;
          
          /*Action to get Mapped COurse details from temp table By Ashis kumar Patra*/
          
            IF(P_ACTION='CMD')THEN

			SET @P_SQL='SELECT intCourseId, vchSectorId,vchCourseNameE,vchCourseCode FROM t_course_temp WHERE bitDeletedFlag=0 ';	
              
		    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY vchCourseNameE');

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;		

		  END IF;
          
          
          /*Action to add all course id from temp table By Rahul Kumar Saw*/

            IF(P_ACTION='ATD')THEN
			SET @P_STATUS	= 0;
            START TRANSACTION;
           	SET SQL_SAFE_UPDATES =0;
			SET @map = P_MAPPING_CODE;
            
            SET @P_DEl = concat('update t_course_tagged SET bitDeletedFlag=1  where intOSDACourseId IN (',@map,')');
            
            PREPARE STMT1 FROM @P_DEl;
		    EXECUTE STMT1;
        /*Use to update flag as tagged in course master
        ================================================*/
          
          IF(P_COURSE_TYPE>0 && P_COURSE_TYPE IN(1,2))THEN
           SET @P_UPD = concat('update t_course_details SET intSamsTagFlag=1  where intCourseId IN (',@map,')'); 
           ELSE IF(P_COURSE_TYPE>0 && P_COURSE_TYPE=3)THEN
             SET @P_UPD = concat('update t_course_details SET intNicTagFlag=1  where intCourseId IN (',@map,')'); 
			END IF;
		 END IF;
        
          PREPARE STMT2 FROM @P_UPD;
		  EXECUTE STMT2;
         
          /*====Tagging Flag update end======*/  
            SET @P_SQL = CONCAT('INSERT INTO t_course_tagged(intSAMSITICourseId,intOSDACourseId, intNICCourse, intSAMSPOLCourseId, intCreatedBy) VALUES ',P_DETAILS);
            
			 PREPARE STMT FROM @P_SQL;
		     EXECUTE STMT;

			SET @P_STATUS	= LAST_INSERT_ID();
			COMMIT;	

		SELECT  @P_STATUS;   

	END IF;
	
     /*Action to get Mapped COurse details from temp table By Ashis kumar Patra*/
          
            IF(P_ACTION='TVD')THEN
             SET @P_SQL = 'SELECT intCourseId, intOSDACourseId, intSAMSITICourseId,intSAMSPOLCourseId, intNICCourse, intCreatedBy,(select tem.vchCourseNameE from t_course_temp tem where tem.vchCourseCode=intNICCourse) AS nicCourse,(select td.vchCourseNameE from t_course_details td where td.intCourseId=intOSDACourseId) AS osdaCourse,(select tmp.vchCourseNameE from t_course_sams_temp tmp where tmp.intSamsCourseId=intSAMSITICourseId AND intInstituteType=11) AS samsCourse FROM t_course_tagged WHERE bitDeletedFlag=0 AND intSAMSITICourseId!=0';
		    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY intCourseId');

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;		

		  END IF;
          
          /*Action to get Mapped COurse details from temp table By Ashis kumar Patra*/
          
            IF(P_ACTION='TDV')THEN
             SET @P_SQL = 'SELECT intCourseId, intOSDACourseId, intSAMSITICourseId,intSAMSPOLCourseId, intNICCourse, intCreatedBy,(select tem.vchCourseNameE from t_course_temp tem where tem.vchCourseCode=intNICCourse) AS nicCourse,(select td.vchCourseNameE from t_course_details td where td.intCourseId=intOSDACourseId) AS osdaCourse,(select tmp.vchCourseNameE from t_course_sams_temp tmp where tmp.intSamsCourseId=intSAMSPOLCourseId AND intInstituteType=12) AS samsPolCourse FROM t_course_tagged WHERE bitDeletedFlag=0 AND intSAMSPOLCourseId!=0';
		    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY intCourseId');

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;		

		  END IF;
          
          
          
          /*Action to insert course Data from API response SAMS By Rahul ON 06-08-2019 */        
        
	IF(P_ACTION='SAM')THEN
			SET @P_STATUS	= 0;
                TRUNCATE t_course_sams_temp;
			START TRANSACTION;
				
		SET @P_SQL=CONCAT('INSERT INTO `t_course_sams_temp`(intSamsCourseId,`vchCourseNameE`,`vchQualificationId`,`vchQualificationName`,`intDuration`,`intInstituteType`,
`intCreatedBy`,`decDurationHr`) VALUES ',P_SEARCH);
 -- select @P_SQL;
		 PREPARE STMT FROM @P_SQL;
		 EXECUTE STMT;

			SET @P_STATUS	= LAST_INSERT_ID();
			COMMIT;	

		SELECT  @P_STATUS;   

	END IF;
    
	/*Action to get SAMS COurse details from temp table By Rahul Kumar*/
          
            IF(P_ACTION='SV')THEN

			SET @P_SQL='SELECT intCourseId, intSamsCourseId,vchCourseNameE,intInstituteType FROM t_course_sams_temp WHERE bitDeletedFlag=0 ';	
            
            IF(P_PAGE_SIZE>0)THEN

				  SET @P_SQL=CONCAT(@P_SQL,' AND intInstituteType=',P_PAGE_SIZE);

				 END IF;
                 
		    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY vchCourseNameE');

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;		

		  END IF;
    

END