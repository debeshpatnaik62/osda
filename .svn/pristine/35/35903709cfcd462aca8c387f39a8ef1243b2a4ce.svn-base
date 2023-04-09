CREATE  PROCEDURE `USP_INSTITUTE_DETAILS`(

		  IN  P_ACTION      		VARCHAR(3),

		  IN  P_INSTITUTE_ID  		INT,

          IN  P_DISTRICT_ID  		INT,

		  IN  P_INSTITUTE_NAME  	VARCHAR(128),

          IN  P_INSTITUTE_NAME_O  	VARCHAR(256) CHARSET utf8,

		  IN  P_INSTITUTE_TYPE   	INT,

          IN  P_EST_YEAR   			INT,

		  IN  P_EMAIL    			VARCHAR(128),

          IN  P_PHONE_NO   			VARCHAR(16),

          IN  P_WEBSITE   			VARCHAR(128),

          IN  P_IMAGE   			VARCHAR(128),

          IN  P_ADDRESS   			VARCHAR(512),

		  IN  P_ADDRESS_O    		TEXT CHARSET utf8,

          IN  P_DETAILS   			LONGTEXT CHARSET utf8,

		  IN  P_DETAILS_O    		TEXT CHARSET utf8,

          IN  P_PRINCIPLE   		VARCHAR(128),

		  IN  P_PRINCIPLE_O    		VARCHAR(256) CHARSET utf8,

          IN  P_PUB_STATUS      	INT,

		  IN  P_ARC_STATUS      	TINYINT(3),

		  IN  P_CREATED_BY  		INT,

          IN  P_PAGE_SIZE  	    	INT,

          IN  P_INSTITUTE_ALIAS   	VARCHAR(128),

          IN  P_MOBILE_NO           VARCHAR(16),

          IN  P_PIA_STATUS          TINYINT(3),

          IN  P_PIN_CODE			VARCHAR(10),

          IN  P_LAT 				DECIMAL(20,15),

          IN  P_LONG 				DECIMAL(20,15),

          IN  P_PARENT_ID  	    	INT,

		  IN  P_QUERY				LONGTEXT CHARSET utf8,
          
          IN  P_MAPPING_CODE		VARCHAR(16)

		)
BEGIN		

		

/*Exception Handling created By: Rahul Kumar Saw :: created On : 18-Sep-2018*/
DECLARE EXIT HANDLER FOR NOT FOUND
 BEGIN
 
GET DIAGNOSTICS CONDITION 1
@p1 = RETURNED_SQLSTATE, @p2 = MESSAGE_TEXT,    
@sqlstate = RETURNED_SQLSTATE, 
@errno = MYSQL_ERRNO,
@text  = MESSAGE_TEXT; 
SET @full_error = CONCAT("NOT FOUND ", @errno, " (", @sqlstate, "): ", @text); 
    
    SET @P_STATUS_ERR = 4;
    SET @P_MSG=('Error: Table or column not found');
    SELECT  @P_STATUS,@P_MSG;
 ROLLBACK;
    INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_sams_institute_course_tmp',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`='CALL USP_INSTITUTE_DETAILS';
END;

DECLARE EXIT HANDLER FOR SQLWARNING
 BEGIN
 
    GET DIAGNOSTICS CONDITION 1
@p1 = RETURNED_SQLSTATE, @p2 = MESSAGE_TEXT,    
@sqlstate = RETURNED_SQLSTATE, 
@errno = MYSQL_ERRNO,
@text  = MESSAGE_TEXT; 
SET @full_error = CONCAT("SQLWARNING ", @errno, " (", @sqlstate, "): ", @text); 
   
    SET @P_STATUS_ERR = 4;
    SET @P_MSG=('ERROR: Unable to process your request in Procedure');
    SELECT  @P_STATUS,@P_MSG;
 ROLLBACK;
	INSERT INTO error_log SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABLE_NAME`='t_sams_institute_course_tmp',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`='CALL USP_INSTITUTE_DETAILS';
END;

DECLARE EXIT HANDLER FOR SQLEXCEPTION 
BEGIN

GET DIAGNOSTICS CONDITION 1
@p1 = RETURNED_SQLSTATE, @p2 = MESSAGE_TEXT,    
@sqlstate = RETURNED_SQLSTATE, 
@errno = MYSQL_ERRNO,
@text  = MESSAGE_TEXT; 
SET @full_error = CONCAT("SQLEXCEPTION ", @errno, " (", @sqlstate, "): ", @text); 

      SET @P_STATUS_ERR=4;
      SET @P_MSG=('ERROR: Unable to process your request in DATABASE'); 
      
      SELECT  @P_STATUS,@P_MSG;
      ROLLBACK;
      
      INSERT INTO `error_log` SET `VCH_ACTION_CODE`=P_ACTION,`VCH_TABALE_NAME`='t_sams_institute_course_tmp',`VCH_ERROR_DESC`=@full_error,`VCH_SQL_QUERY`='CALL USP_INSTITUTE_DETAILS';
END;
/* ==================================== Error log end =========================== */
			

           IF(P_ACTION='AU')THEN

          

              START TRANSACTION;

              

				IF(P_INSTITUTE_ID>0)THEN

					SET @DUP_CTR2 = (SELECT COUNT(1) FROM t_institute_details WHERE bitDeletedFlag=0 AND vchInstituteName=P_INSTITUTE_NAME AND intInstituteId!= P_INSTITUTE_ID);	 

                    SET @DUP_CTR = (SELECT COUNT(1) FROM t_institute_details WHERE bitDeletedFlag=0 AND vchInstituteAlias=P_INSTITUTE_ALIAS AND intInstituteId!= P_INSTITUTE_ID);	 

					IF(@DUP_CTR =0 && @DUP_CTR2=0)THEN            

						UPDATE t_institute_details SET intDistrictId = P_DISTRICT_ID,vchInstituteName = P_INSTITUTE_NAME,vchInstituteNameO = P_INSTITUTE_NAME_O,tinInstituteType =P_INSTITUTE_TYPE,intEstYear= P_EST_YEAR,vchEmailId =P_EMAIL,vchPhoneno= P_PHONE_NO,vchWebsite =P_WEBSITE,vchImage= P_IMAGE,vchAddress=P_ADDRESS,txtAddressO=P_ADDRESS_O,vchDescriptionE = P_DETAILS,vchDescriptionO= P_DETAILS_O,vchPrincipalName=P_PRINCIPLE,vchPrincipalNameO=P_PRINCIPLE_O,intUpdatedBy=P_CREATED_BY,vchInstituteAlias=P_INSTITUTE_ALIAS,vchMobileNo=P_MOBILE_NO,tinIsPIA=P_PIA_STATUS,vchPinCode=P_PIN_CODE,fltLat=P_LAT,fltLong=P_LONG, intParentId = P_PARENT_ID,vchInsMapCode=P_MAPPING_CODE WHERE intInstituteId = P_INSTITUTE_ID;   
						SET @P_STATUS	= P_INSTITUTE_ID;

					ELSE

						SET @P_STATUS	= 0;

				   END IF;   

				ELSE

				  SET @CTR = (SELECT COUNT(1) FROM t_institute_details WHERE bitDeletedFlag=0 AND vchInstituteName=P_INSTITUTE_NAME );	  

                   SET @CTR2 = (SELECT COUNT(1) FROM t_institute_details WHERE bitDeletedFlag=0 AND vchInstituteAlias=P_INSTITUTE_ALIAS);	

				  IF(@CTR =0 && @CTR2=0)THEN

					INSERT INTO t_institute_details(intDistrictId, vchInstituteName, vchInstituteNameO, tinInstituteType, intEstYear, vchEmailId, vchPhoneno, vchWebsite, vchImage, vchAddress,txtAddressO,vchDescriptionE, vchDescriptionO,vchPrincipalName,vchPrincipalNameO,stmCreatedOn, intCreatedBy,vchInstituteAlias,vchMobileNo,tinIsPIA,vchPinCode,fltLat,fltLong,intParentId,vchInsMapCode)VALUES (P_DISTRICT_ID,P_INSTITUTE_NAME,P_INSTITUTE_NAME_O,P_INSTITUTE_TYPE,P_EST_YEAR,P_EMAIL,P_PHONE_NO,P_WEBSITE,P_IMAGE,P_ADDRESS,P_ADDRESS_O,P_DETAILS,P_DETAILS_O,P_PRINCIPLE,P_PRINCIPLE_O,NOW(),P_CREATED_BY,P_INSTITUTE_ALIAS,P_MOBILE_NO,P_PIA_STATUS,P_PIN_CODE,P_LAT,P_LONG,P_PARENT_ID,P_MAPPING_CODE);

												   

					SET @P_STATUS	= LAST_INSERT_ID();         

				  ELSE

					SET @P_STATUS	= 0;

				  END IF;            

				END IF;  

                

                

                

				IF(CHAR_LENGTH(P_QUERY)>0) THEN

                

                  IF(@P_STATUS >0) THEN

						

						SET @P_INST_ID		= @P_STATUS;

								DELETE FROM t_institute_pia WHERE intInstdetailsId = @P_INST_ID;	

                        

                        SET @P_SQL	=	CONCAT('INSERT INTO t_institute_pia (intInstdetailsId, intIspia,stmCreatedOn,intCreatedBy,intIntTypeId) VALUES ',P_QUERY);

						PREPARE STMT FROM @P_SQL;

						EXECUTE STMT;

				

                  END IF;

                  

                END IF;

                 

                

                

			 COMMIT;	

			 SELECT  @P_STATUS;   

		  END IF;

		  IF(P_ACTION='V')THEN

			SET @P_SQL='SELECT intInstituteId,intDistrictId,(select vchDistrictname from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictname,(select vchDistrictnameO from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictnameO, vchInstituteName, vchInstituteNameO, tinInstituteType, intEstYear,vchInstituteAlias, vchEmailId, vchPhoneno, vchWebsite, vchImage, vchDescriptionE, vchDescriptionO,vchAddress,txtAddressO,vchPrincipalName,vchPrincipalNameO,stmCreatedOn,intCreatedBy,tinPublishStatus,tinArcStatus,vchMobileNo, tinIsPIA ,vchPinCode,fltLat,fltLong,(SELECT group_concat(tp.intIspia) FROM t_institute_pia tp where tp.bitDeletedFlag = 0 and tp.intInstdetailsId=td.intInstituteId)as piaDetails,intParentId ,vchInsMapCode,(select vchInstituteName from t_institute_details ts where ts.bitDeletedFlag=0 and ts.intInstituteId=td.intParentId)as strTrainingPartner FROM t_institute_details td WHERE td.bitDeletedFlag=0 ';				 

            	

                 IF(P_DISTRICT_ID>0)THEN

				  SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',P_DISTRICT_ID);

				END IF; 

				                

                IF(P_PUB_STATUS>0)THEN

				  SET @P_SQL=CONCAT(@P_SQL,' AND tinPublishStatus=',P_PUB_STATUS);

				END IF; 

                

                IF(P_INSTITUTE_TYPE>0) THEN

                  SET @P_SQL = CONCAT(@P_SQL,' AND tinInstituteType=',P_INSTITUTE_TYPE);

                END IF;

                IF(P_PIA_STATUS>0) THEN

                  SET @P_SQL = CONCAT(@P_SQL,' AND tinIsPIA=',P_PIA_STATUS);

                END IF;

                

                IF(CHAR_LENGTH(P_INSTITUTE_NAME)>0) THEN

                  SET @P_SQL = CONCAT(@P_SQL,' AND vchInstituteName LIKE "%',P_INSTITUTE_NAME,'%" ');

                END IF;

		    SET @P_SQL=CONCAT(@P_SQL,' AND tinArcStatus = ',P_ARC_STATUS,' ORDER BY stmCreatedOn DESC ');

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;		

		  END IF;

		 

         IF(P_ACTION='M')THEN

         

         

					SELECT intInstituteId,intDistrictId,(select vchDistrictname from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as 

					vchDistrictname,(select vchDistrictnameO from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictnameO, 

					vchInstituteName, vchInstituteNameO, tinInstituteType, intEstYear,vchInstituteAlias, vchEmailId, vchPhoneno, vchWebsite, vchImage, vchDescriptionE, 

					vchDescriptionO,vchAddress,txtAddressO,vchPrincipalName,vchPrincipalNameO,td.stmCreatedOn,td.intCreatedBy,tinPublishStatus,tinArcStatus,vchMobileNo, 

					tinIsPIA ,vchPinCode,fltLat,fltLong FROM t_institute_details td WHERE td.bitDeletedFlag=0 and tinPublishStatus=2 and tinIsPIA in (1,2,3) and tinArcStatus=0 ;

             

		  END IF;

		

		IF(P_ACTION='PG') THEN

			SET @START_REC	= P_INSTITUTE_ID;

			SET @P_SQL='SELECT intInstituteId,intDistrictId,(select vchDistrictname from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictname,(select vchDistrictnameO from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictnameO, vchInstituteName, vchInstituteNameO, tinInstituteType, vchInstituteAlias,intEstYear, vchEmailId, vchPhoneno, vchWebsite, vchImage, vchDescriptionE, tinIsPIA,vchDescriptionO,stmCreatedOn,vchPrincipalName,vchAddress,txtAddressO,vchPrincipalNameO,intCreatedBy,tinPublishStatus,tinArcStatus,vchMobileNo, vchPinCode,fltLat,fltLong,(SELECT group_concat(tp.intIspia) FROM t_institute_pia tp where tp.bitDeletedFlag = 0 and tp.intInstdetailsId=td.intInstituteId)as piaDetails,intParentId,vchInsMapCode,(select vchInstituteName from t_institute_details ts where ts.bitDeletedFlag=0 and ts.intInstituteId=td.intParentId)as strTrainingPartner FROM t_institute_details td WHERE bitDeletedFlag=0 ';				 

            

            IF(P_DISTRICT_ID>0)THEN

			  SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',P_DISTRICT_ID);

			END IF; 

                

			  IF(P_PUB_STATUS>0)THEN

				  SET @P_SQL = CONCAT(@P_SQL,' AND tinPublishStatus=',P_PUB_STATUS);

			  END IF;           

              

              IF(P_INSTITUTE_TYPE>0) THEN

                SET @P_SQL = CONCAT(@P_SQL,' AND tinInstituteType=',P_INSTITUTE_TYPE);

              END IF;

              IF(P_PIA_STATUS>0) THEN

                  SET @P_SQL = CONCAT(@P_SQL,' AND tinIsPIA=',P_PIA_STATUS);

			  END IF;

              IF(CHAR_LENGTH(P_INSTITUTE_NAME)>0) THEN

                 SET @P_SQL = CONCAT(@P_SQL,' AND vchInstituteName LIKE "%',P_INSTITUTE_NAME,'%" ');

              END IF;

			 SET @P_SQL = CONCAT(@P_SQL,' AND tinArcStatus = ',P_ARC_STATUS,' ORDER BY stmCreatedOn DESC LIMIT ?,',P_PAGE_SIZE);		

			 PREPARE STMT FROM @P_SQL;

			 EXECUTE STMT USING @START_REC;

	   END IF;

            

		

		  

		

	   IF(P_ACTION='CT')THEN

			SET @P_SQL  = 'SELECT count(1) AS COUNT FROM t_institute_details WHERE bitDeletedFlag=0 ';

		

			IF(P_DISTRICT_ID>0)THEN

			  SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',P_DISTRICT_ID);

			END IF; 

            

			 IF(P_PUB_STATUS>0)THEN

				  SET @P_SQL = CONCAT(@P_SQL,' AND tinPublishStatus=',P_PUB_STATUS);

			  END IF;  

              

              IF(P_INSTITUTE_TYPE>0) THEN

                SET @P_SQL = CONCAT(@P_SQL,' AND tinInstituteType=',P_INSTITUTE_TYPE);

              END IF;

               IF(P_PIA_STATUS>0) THEN

                  SET @P_SQL = CONCAT(@P_SQL,' AND tinIsPIA=',P_PIA_STATUS);

			  END IF;

              

              IF(CHAR_LENGTH(P_INSTITUTE_NAME)>0) THEN

                 SET @P_SQL = CONCAT(@P_SQL,' AND vchInstituteName LIKE "%',P_INSTITUTE_NAME,'%" ');

              END IF;

		    SET @P_SQL = CONCAT(@P_SQL,' AND tinArcStatus = ',P_ARC_STATUS);            

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;		

	   END IF;

	 

		

	  IF(P_ACTION='D')THEN	

      

		   IF(SELECT COUNT(1) FROM t_institute_course WHERE bitDeletedflag= 0 AND intInstituteId=P_INSTITUTE_ID=0)THEN

           

			  UPDATE t_institute_details SET bitDeletedFlag=1,intUpdatedBy = P_CREATED_BY WHERE intInstituteId = P_INSTITUTE_ID ;	

              UPDATE t_institute_pia SET bitDeletedFlag=1, intUpdatedBy = P_CREATED_BY WHERE intInstdetailsId = P_INSTITUTE_ID ;

              

			  SELECT 0;

		   ELSE

			  SELECT 1;

		   END IF;		  

	  END IF;

			

	  IF(P_ACTION='R') THEN		

		SELECT intInstituteId,intDistrictId,(select vchDistrictname from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictname,(select vchDistrictnameO from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictnameO, vchInstituteName, vchInstituteNameO, vchMobileNo, tinInstituteType, intEstYear, vchEmailId, vchInstituteAlias,vchPhoneno, vchWebsite, vchImage, vchDescriptionE, vchDescriptionO,vchPrincipalName,vchAddress,txtAddressO,vchPrincipalNameO,stmCreatedOn, intCreatedBy,tinPublishStatus,tinArcStatus,tinIsPIA,vchPincode,fltLat,fltLong,intParentId,vchInsMapCode FROM t_institute_details td WHERE bitDeletedFlag=0 AND intInstituteId = P_INSTITUTE_ID ;		

	  END IF;

      

      IF(P_ACTION='RA') THEN		

		SELECT intInstituteId,intDistrictId,(select vchDistrictname from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictname,(select vchDistrictnameO from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictnameO, vchInstituteName, vchInstituteNameO, tinInstituteType, intEstYear, vchEmailId, vchInstituteAlias,vchPhoneno, vchWebsite, vchImage, vchDescriptionE, vchDescriptionO,vchPrincipalName,vchAddress,txtAddressO,vchPrincipalNameO,stmCreatedOn, intCreatedBy,tinPublishStatus,tinArcStatus,vchMobileNo,fltLat,fltLong,intParentId FROM t_institute_details td WHERE bitDeletedFlag=0 AND vchInstituteAlias = P_INSTITUTE_ALIAS ;		

	  END IF;	

	 

	  IF(P_ACTION='IN')THEN

		UPDATE t_institute_details SET tinPublishStatus=1,intUpdatedBy=P_CREATED_BY WHERE intInstituteId = P_INSTITUTE_ID ;		

		SELECT 'Institute details Inactivated Successfully';

	  END IF;

	  IF(P_ACTION='AC')THEN

		UPDATE t_institute_details SET tinPublishStatus=1,tinArcStatus=0,intUpdatedBy=P_CREATED_BY WHERE intInstituteId = P_INSTITUTE_ID;		

		SELECT 'Institute details Activated Successfully';

	  END IF;

	  

	  IF(P_ACTION='P')THEN

		UPDATE t_institute_details SET tinPublishStatus=2,tinArcStatus=0,intUpdatedBy=P_CREATED_BY WHERE intInstituteId = P_INSTITUTE_ID;		

		SELECT 'Institute details published Successfully';

	  END IF;

	  

	  IF(P_ACTION='AR')THEN

		UPDATE t_institute_details SET tinArcStatus=1,tinPublishStatus=1,intUpdatedBy=P_CREATED_BY WHERE intInstituteId = P_INSTITUTE_ID;		

		SELECT 'Institute details archieved Successfully';

	  END IF;

      

      

		  IF(P_ACTION='VP')THEN

			SET @P_SQL='SELECT intInstituteId,intDistrictId,(select vchDistrictname from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictname,(select vchDistrictnameO from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictnameO, vchInstituteName, vchInstituteNameO, tinInstituteType, vchInstituteAlias,intEstYear, vchEmailId, vchPhoneno, vchWebsite, vchPinCode,vchImage, vchDescriptionE, vchDescriptionO,stmCreatedOn,vchPrincipalName,vchAddress,txtAddressO,vchPrincipalNameO,intCreatedBy,tinPublishStatus,tinArcStatus,vchMobileNo,intParentId FROM t_institute_details td WHERE bitDeletedFlag=0 AND tinPublishStatus=2 ';					 

            	

			IF(P_DISTRICT_ID>0)THEN

			  SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',P_DISTRICT_ID);

			END IF; 

                

			 IF(CHAR_LENGTH(P_INSTITUTE_NAME)>0)THEN

					SET @P_SQL	= CONCAT(@P_SQL,' AND (vchInstituteName LIKE "%',P_INSTITUTE_NAME,'%" OR td.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId IN (select ts.intCourseId from t_course_details ts where ts.bitDeletedFlag=0  and ts.vchCourseNameE LIKE "%',P_INSTITUTE_NAME,'%" ))) ');

				END IF;

				                

			IF(P_PUB_STATUS>0)THEN

			  SET @P_SQL=CONCAT(@P_SQL,' AND td.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId =',P_PUB_STATUS,') ');

			END IF;

             IF(P_PIA_STATUS>0) THEN

					  SET @P_SQL = CONCAT(@P_SQL,' AND tinIsPIA=',P_PIA_STATUS);

		     END IF;

             

              IF(CHAR_LENGTH(P_INSTITUTE_ALIAS)>0) THEN

                 SET @P_SQL = CONCAT(@P_SQL,' AND td.vchInstituteAlias LIKE "%',P_INSTITUTE_ALIAS,'%" ');

              END IF;

		     SET @P_SQL=CONCAT(@P_SQL,' AND tinArcStatus = ',P_ARC_STATUS,' ORDER BY vchInstituteName ASC ');		

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;		

		  END IF;

		 

         

		

		IF(P_ACTION='PPG') THEN

			SET @START_REC	= P_INSTITUTE_ID;

			SET @P_SQL='SELECT intInstituteId,intDistrictId,(select vchDistrictname from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictname,(select vchDistrictnameO from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictnameO, vchInstituteName, vchInstituteNameO, tinInstituteType, vchInstituteAlias,intEstYear, vchEmailId, vchPhoneno, vchWebsite, vchPinCode,vchImage, vchDescriptionE, vchDescriptionO,stmCreatedOn,vchPrincipalName,vchAddress,txtAddressO,vchPrincipalNameO,intCreatedBy,tinPublishStatus,tinArcStatus,vchMobileNo,intParentId FROM t_institute_details td WHERE bitDeletedFlag=0 AND tinPublishStatus=2 ';				 

            

            IF(P_DISTRICT_ID>0)THEN

			  SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',P_DISTRICT_ID);

			END IF; 

                

			 IF(CHAR_LENGTH(P_INSTITUTE_NAME)>0)THEN

					SET @P_SQL	= CONCAT(@P_SQL,' AND (vchInstituteName LIKE "%',P_INSTITUTE_NAME,'%" OR td.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId IN (select ts.intCourseId from t_course_details ts where ts.bitDeletedFlag=0  and ts.vchCourseNameE LIKE "%',P_INSTITUTE_NAME,'%" ))) ');

				END IF;

				                

			IF(P_PUB_STATUS>0)THEN

			  SET @P_SQL=CONCAT(@P_SQL,' AND td.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId =',P_PUB_STATUS,') ');

			END IF;

             IF(P_PIA_STATUS>0) THEN

					  SET @P_SQL = CONCAT(@P_SQL,' AND tinIsPIA=',P_PIA_STATUS);

		     END IF;

             

              IF(CHAR_LENGTH(P_INSTITUTE_ALIAS)>0) THEN

                 SET @P_SQL = CONCAT(@P_SQL,' AND td.vchInstituteAlias LIKE "%',P_INSTITUTE_ALIAS,'%" ');

              END IF;

		     SET @P_SQL=CONCAT(@P_SQL,' AND tinArcStatus = ',P_ARC_STATUS,' ORDER BY vchInstituteName ASC LIMIT ?,',P_PAGE_SIZE);		

			 PREPARE STMT FROM @P_SQL;

			 EXECUTE STMT USING @START_REC;

	   END IF;

       

          

		IF(P_ACTION='CTP')THEN

			SET @P_SQL  = 'SELECT count(1) AS COUNT FROM t_institute_details td WHERE bitDeletedFlag=0 AND tinPublishStatus=2  ';

            

				

            IF(P_DISTRICT_ID>0)THEN

			  SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',P_DISTRICT_ID);

			END IF; 

		

			 IF(CHAR_LENGTH(P_INSTITUTE_NAME)>0)THEN

					SET @P_SQL	= CONCAT(@P_SQL,' AND (vchInstituteName LIKE "%',P_INSTITUTE_NAME,'%" OR td.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId IN (select ts.intCourseId from t_course_details ts where ts.bitDeletedFlag=0  and ts.vchCourseNameE LIKE "%',P_INSTITUTE_NAME,'%" ))) ');

				END IF;

				                

			IF(P_PUB_STATUS>0)THEN

			  SET @P_SQL=CONCAT(@P_SQL,' AND td.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId =',P_PUB_STATUS,') ');

			END IF; 

            

             IF(P_PIA_STATUS>0) THEN

					  SET @P_SQL = CONCAT(@P_SQL,' AND tinIsPIA=',P_PIA_STATUS);

		     END IF;

             

             IF(CHAR_LENGTH(P_INSTITUTE_ALIAS)>0) THEN

                 SET @P_SQL = CONCAT(@P_SQL,' AND td.vchInstituteAlias LIKE "%',P_INSTITUTE_ALIAS,'%" ');

			 END IF;

		    SET @P_SQL = CONCAT(@P_SQL,' AND tinArcStatus = ',P_ARC_STATUS);            

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;		

	   END IF;  

            

            

       IF(P_ACTION='PIG') THEN

			SET @START_REC	= P_INSTITUTE_ID;

			SET @P_SQL='SELECT intInstituteId,intDistrictId,(select vchDistrictname from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictname,(select vchDistrictnameO from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictnameO, vchInstituteName, vchInstituteNameO, tinInstituteType, vchInstituteAlias,intEstYear, vchEmailId, vchPhoneno, vchWebsite,vchPinCode, vchImage, vchDescriptionE, vchDescriptionO,stmCreatedOn,vchPrincipalName,vchAddress,txtAddressO,vchPrincipalNameO,intCreatedBy,tinPublishStatus,tinArcStatus,vchMobileNo,intParentId FROM t_institute_details td WHERE bitDeletedFlag=0 AND tinPublishStatus=2 ';				 

            

            IF(P_DISTRICT_ID>0)THEN

			  SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',P_DISTRICT_ID);

			END IF; 

                

			 IF(CHAR_LENGTH(P_INSTITUTE_NAME)>0)THEN

					SET @P_SQL	= CONCAT(@P_SQL,' AND (vchInstituteName LIKE "%',P_INSTITUTE_NAME,'%" OR td.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId IN (select ts.intCourseId from t_course_details ts where ts.bitDeletedFlag=0  and ts.vchCourseNameE LIKE "%',P_INSTITUTE_NAME,'%" ))) ');

				END IF;

				                

			IF(P_PUB_STATUS>0)THEN

			  SET @P_SQL=CONCAT(@P_SQL,' AND td.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId =',P_PUB_STATUS,') ');

			END IF;

             IF(P_PIA_STATUS>0) THEN

					  SET @P_SQL = CONCAT(@P_SQL,' AND tinIsPIA=',P_PIA_STATUS);

		 END IF;

		     SET @P_SQL=CONCAT(@P_SQL,' AND tinArcStatus = ',P_ARC_STATUS,' group by vchInstituteName  ORDER BY vchInstituteName ASC LIMIT ?,',P_PAGE_SIZE);		

			 PREPARE STMT FROM @P_SQL;

			 EXECUTE STMT USING @START_REC;

	   END IF;

       

       IF(P_ACTION='VPI')THEN

			SET @P_SQL='SELECT intInstituteId,intDistrictId,(select vchDistrictname from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictname,(select vchDistrictnameO from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictnameO, vchInstituteName, vchInstituteNameO, tinInstituteType, vchInstituteAlias,intEstYear, vchEmailId, vchPhoneno, vchWebsite,vchPinCode, vchImage, vchDescriptionE, vchDescriptionO,stmCreatedOn,vchPrincipalName,vchAddress,txtAddressO,vchPrincipalNameO,intCreatedBy,tinPublishStatus,tinArcStatus,vchMobileNo,tinIsPIA,intParentId FROM t_institute_details td WHERE bitDeletedFlag=0 AND tinPublishStatus=2 ';				 

			

				IF(P_DISTRICT_ID>0)THEN

				  SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',P_DISTRICT_ID);

				END IF; 

                

				IF(CHAR_LENGTH(P_INSTITUTE_NAME)>0)THEN

					SET @P_SQL	= CONCAT(@P_SQL,' AND (vchInstituteName LIKE "%',P_INSTITUTE_NAME,'%" OR td.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId IN (select ts.intCourseId from t_course_details ts where ts.bitDeletedFlag=0  and ts.vchCourseNameE LIKE "%',P_INSTITUTE_NAME,'%" ))) ');

				END IF;

				                

                IF(P_PUB_STATUS>0)THEN

				  SET @P_SQL=CONCAT(@P_SQL,' AND td.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId =',P_PUB_STATUS,') ');

				END IF; 

                IF(P_PIA_STATUS>0) THEN

                  SET @P_SQL = CONCAT(@P_SQL,' AND tinIsPIA=',P_PIA_STATUS);

			    END IF;

                

                IF(CHAR_LENGTH(P_INSTITUTE_ALIAS)>0) THEN

                   SET @P_SQL = CONCAT(@P_SQL,' AND td.vchInstituteAlias LIKE "%',P_INSTITUTE_ALIAS,'%" ');

                END IF;

		    SET @P_SQL=CONCAT(@P_SQL,' AND td.tinArcStatus = ',P_ARC_STATUS,' ORDER BY vchInstituteName ASC ');

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;		

		  END IF;

		

	

	   

       

       IF(P_ACTION='CPI')THEN

			SET @P_SQL  = 'SELECT (SUM(COUNT)) from (SELECT count(1) as COUNT FROM t_institute_details td WHERE bitDeletedFlag=0 AND tinPublishStatus=2 ';

            

				

            IF(P_DISTRICT_ID>0)THEN

			  SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',P_DISTRICT_ID);

			END IF; 

		

			 IF(CHAR_LENGTH(P_INSTITUTE_NAME)>0)THEN

					SET @P_SQL	= CONCAT(@P_SQL,' AND (vchInstituteName LIKE "%',P_INSTITUTE_NAME,'%" OR td.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId IN (select ts.intCourseId from t_course_details ts where ts.bitDeletedFlag=0  and ts.vchCourseNameE LIKE "%',P_INSTITUTE_NAME,'%" ))) ');

				END IF;

				                

			IF(P_PUB_STATUS>0)THEN

			  SET @P_SQL=CONCAT(@P_SQL,' AND td.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId =',P_PUB_STATUS,') ');

			END IF; 

            

             IF(P_PIA_STATUS>0) THEN

					  SET @P_SQL = CONCAT(@P_SQL,' AND tinIsPIA=',P_PIA_STATUS);

		     END IF;

		    SET @P_SQL = CONCAT(@P_SQL,' AND td.tinArcStatus = ',P_ARC_STATUS,' group by td.vchInstituteName ORDER BY vchInstituteName ASC) TEMP');            

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;		

	   END IF;

       

    

    IF(P_ACTION='FIP')THEN

        SET @DISTID = 0; SET @NEAR_DISTS ='';

      IF(CHAR_LENGTH(P_PIN_CODE)>0)THEN		  

		  

		   SET @NEAR_DISTS = (SELECT GROUP_CONCAT(CONCAT(intDistrictid,",",vchNearDists)) from m_district ts where ts.bitDeletedflag=0 AND intDistrictid IN (SELECT DISTINCT(intDistId) from m_pincodes MP where vchPincode = P_PIN_CODE));

       ELSE

		   SET @DISTID = P_DISTRICT_ID;

	   END IF; 

       

      

			SET @P_SQL  = 'SELECT td.intInstituteId,intDistrictId,(select vchDistrictname from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictname,(select vchDistrictnameO from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictnameO, vchInstituteName, vchInstituteNameO, tinInstituteType, intEstYear,vchInstituteAlias, vchEmailId, vchPhoneno, vchWebsite, vchImage, vchDescriptionE, vchDescriptionO,vchAddress,txtAddressO,vchPrincipalName,vchPrincipalNameO,stmCreatedOn,intCreatedBy,tinPublishStatus,tinArcStatus,vchMobileNo, tinIsPIA ,vchPinCode,intParentId FROM t_institute_details td  WHERE bitDeletedFlag=0  AND tinPublishStatus = 2 AND tinArcStatus = 0 AND tinIsPIA IN (1,3) ';

		     

               IF(CHAR_LENGTH(@NEAR_DISTS)>0)THEN

				  SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId IN( ',@NEAR_DISTS,')');			    

			   END IF;

               

                IF(@DISTID>0)THEN

				   SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId = ',@DISTID);

				END IF; 

		    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY case when intDistrictId = ',@DISTID,' then 1 else 2 end, vchInstituteName ');

			

           PREPARE STMT FROM @P_SQL;

		   EXECUTE STMT;		

	 

      

    

     END IF;

     

     

          

     IF(P_ACTION='IMP') THEN

		

			SET @P_SQL='SELECT MD.intDistrictid,MD.vchDistrictname,MD.vchDistrictnameO,TI.intInstituteId,TI.vchInstituteName,TI.vchInstituteNameO,TI.vchInstituteAlias,TI.vchAddress,TI.txtAddressO,TI.vchEmailId,TI.vchMobileNo, TI.vchPhoneno, TI.vchWebsite FROM m_district MD LEFT JOIN t_institute_details TI ON MD.intDistrictid=TI.intDistrictId AND TI.bitDeletedFlag=0 AND TI.tinPublishStatus=2  ';				 

            

            IF(P_PIA_STATUS>0) THEN

					  SET @P_SQL = CONCAT(@P_SQL,' AND TI.tinIsPIA=',P_PIA_STATUS);

			  END IF; 

            

           SET @P_SQL=CONCAT(@P_SQL,'  WHERE MD.bitDeletedflag =0 ');

           

			 IF(CHAR_LENGTH(P_INSTITUTE_NAME)>0)THEN

					SET @P_SQL	= CONCAT(@P_SQL,' AND (TI.vchInstituteName LIKE "%',P_INSTITUTE_NAME,'%" OR TI.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId IN (select ts.intCourseId from t_course_details ts where ts.bitDeletedFlag=0  and ts.vchCourseNameE LIKE "%',P_INSTITUTE_NAME,'%" ))) ');

				END IF;

				                

			IF(P_PUB_STATUS>0)THEN

			  SET @P_SQL=CONCAT(@P_SQL,' AND TI.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId =',P_PUB_STATUS,') ');

			END IF;

                        

		 SET @P_SQL=CONCAT(@P_SQL,' ORDER BY  MD.intDistrictid =',P_DISTRICT_ID,' DESC, vchDistrictname ASC ');		

         

       

		 PREPARE STMT FROM @P_SQL;

		 EXECUTE STMT;

	   END IF;

       

       

       IF(P_ACTION='F')THEN

			SET @P_SQL='SELECT intInstituteId,intDistrictId, vchInstituteName, vchInstituteNameO, tinInstituteType, intEstYear,vchInstituteAlias, vchEmailId, vchPhoneno, vchWebsite, vchImage, vchDescriptionE, vchDescriptionO,vchAddress,txtAddressO,vchPrincipalName,vchPrincipalNameO,stmCreatedOn,intCreatedBy,tinPublishStatus,tinArcStatus,vchMobileNo, tinIsPIA ,vchPinCode FROM t_institute_details td WHERE bitDeletedFlag=0 and tinIsPIA!=5 ';				 

            	

                 IF(P_DISTRICT_ID>0)THEN

				  SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',P_DISTRICT_ID);

				END IF; 

				                

                IF(P_PUB_STATUS>0)THEN

				  SET @P_SQL=CONCAT(@P_SQL,' AND tinPublishStatus=',P_PUB_STATUS);

				END IF;                 

		    SET @P_SQL=CONCAT(@P_SQL,' AND tinArcStatus = ',P_ARC_STATUS,' ORDER BY vchInstituteName ASC ');

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;		

		  END IF;

          

		

		IF(P_ACTION='FIC')THEN       

			SELECT count(1) as instCount, tinIsPIA FROM t_institute_details td WHERE td.bitDeletedFlag=0 AND td.tinPublishStatus=2  GROUP BY tinIsPIA ;

		END IF; 

        

     

      

		IF(P_ACTION='RS') THEN

			SELECT * FROM t_institute_pia WHERE intInstdetailsId = P_INSTITUTE_ID;

		END IF;

        

        

        

              

        IF(P_ACTION='VPT')THEN

        

			SET @P_SQL='SELECT td.intInstituteId,td.intDistrictId,(select vchDistrictname from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictname,(select vchDistrictnameO from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictnameO, td.vchInstituteName, td.vchInstituteNameO, td.tinInstituteType, td.vchInstituteAlias,td.intEstYear, td.vchEmailId, td.vchPhoneno, td.vchWebsite, td.vchPinCode,td.vchImage, td.vchDescriptionE, td.vchDescriptionO,td.stmCreatedOn,td.vchPrincipalName,td.vchAddress,td.txtAddressO,td.vchPrincipalNameO,td.intCreatedBy,td.tinPublishStatus,td.tinArcStatus,td.vchMobileNo FROM t_institute_details td WHERE td.bitDeletedFlag=0 AND td.tinPublishStatus=2 AND td.intInstituteId IN (SELECT tp.intInstdetailsId FROM t_institute_pia tp WHERE tp.bitDeletedFlag = 0)  ';            	

			IF(P_DISTRICT_ID>0)THEN

			  SET @P_SQL=CONCAT(@P_SQL,' AND td.intDistrictId=',P_DISTRICT_ID);

			END IF; 

                

			 IF(CHAR_LENGTH(P_INSTITUTE_NAME)>0)THEN

					SET @P_SQL	= CONCAT(@P_SQL,' AND (td.vchInstituteName LIKE "%',P_INSTITUTE_NAME,'%" OR td.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId IN (select ts.intCourseId from t_course_details ts where ts.bitDeletedFlag=0  and ts.vchCourseNameE LIKE "%',P_INSTITUTE_NAME,'%" ))) ');

				END IF;

				                

			IF(P_PUB_STATUS>0)THEN

			  SET @P_SQL=CONCAT(@P_SQL,' AND td.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId =',P_PUB_STATUS,') ');

			END IF;

             IF(P_PIA_STATUS>0) THEN

					  SET @P_SQL = CONCAT(@P_SQL,' AND td.tinIsPIA=',P_PIA_STATUS);

		     END IF;

             

              IF(CHAR_LENGTH(P_INSTITUTE_ALIAS)>0) THEN

                 SET @P_SQL = CONCAT(@P_SQL,' AND td.vchInstituteAlias LIKE "%',P_INSTITUTE_ALIAS,'%" ');

              END IF;

		     SET @P_SQL=CONCAT(@P_SQL,' AND td.tinArcStatus = ',P_ARC_STATUS,' ORDER BY td.vchInstituteName ASC ');		

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;		

		  END IF;

		 

         

		

		IF(P_ACTION='PGT') THEN

			SET @START_REC	= P_INSTITUTE_ID;

			SET @P_SQL='SELECT td.intInstituteId,td.intDistrictId,(select vchDistrictname from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictname,(select vchDistrictnameO from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictnameO, td.vchInstituteName, td.vchInstituteNameO, td.tinInstituteType, td.vchInstituteAlias,td.intEstYear, td.vchEmailId, td.vchPhoneno, td.vchWebsite, td.vchPinCode,td.vchImage, td.vchDescriptionE, td.vchDescriptionO,td.stmCreatedOn,td.vchPrincipalName,td.vchAddress,td.txtAddressO,td.vchPrincipalNameO,td.intCreatedBy,td.tinPublishStatus,td.tinArcStatus,td.vchMobileNo FROM t_institute_details td WHERE td.bitDeletedFlag=0 AND td.tinPublishStatus=2 AND td.intInstituteId IN (SELECT tp.intInstdetailsId FROM t_institute_pia tp WHERE tp.bitDeletedFlag = 0)  ';        	

			IF(P_DISTRICT_ID>0)THEN

			  SET @P_SQL=CONCAT(@P_SQL,' AND td.intDistrictId=',P_DISTRICT_ID);

			END IF; 

                

			 IF(CHAR_LENGTH(P_INSTITUTE_NAME)>0)THEN

					SET @P_SQL	= CONCAT(@P_SQL,' AND (td.vchInstituteName LIKE "%',P_INSTITUTE_NAME,'%" OR td.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId IN (select ts.intCourseId from t_course_details ts where ts.bitDeletedFlag=0  and ts.vchCourseNameE LIKE "%',P_INSTITUTE_NAME,'%" ))) ');

				END IF;

				                

			IF(P_PUB_STATUS>0)THEN

			  SET @P_SQL=CONCAT(@P_SQL,' AND td.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId =',P_PUB_STATUS,') ');

			END IF;

             IF(P_PIA_STATUS>0) THEN

					  SET @P_SQL = CONCAT(@P_SQL,' AND td.tinIsPIA=',P_PIA_STATUS);

		     END IF;

             

              IF(CHAR_LENGTH(P_INSTITUTE_ALIAS)>0) THEN

                 SET @P_SQL = CONCAT(@P_SQL,' AND td.vchInstituteAlias LIKE "%',P_INSTITUTE_ALIAS,'%" ');

              END IF;

		     SET @P_SQL=CONCAT(@P_SQL,' AND td.tinArcStatus = ',P_ARC_STATUS,' ORDER BY td.vchInstituteName ASC LIMIT ?,',P_PAGE_SIZE);		

			 PREPARE STMT FROM @P_SQL;

			 EXECUTE STMT USING @START_REC;

	   END IF;

       

          

		IF(P_ACTION='CTT')THEN

			SET @P_SQL  = 'SELECT count(1) AS COUNT FROM t_institute_details td WHERE td.bitDeletedFlag=0 AND td.tinPublishStatus=2 AND td.intInstituteId IN (SELECT tp.intInstdetailsId FROM t_institute_pia tp WHERE tp.bitDeletedFlag = 0)  ';

            

			 IF(P_DISTRICT_ID>0)THEN

					SET @P_SQL	= CONCAT(@P_SQL,' AND td.intDistrictId=',P_DISTRICT_ID);

			 END IF; 

                

			 IF(CHAR_LENGTH(P_INSTITUTE_NAME)>0)THEN

					SET @P_SQL	= CONCAT(@P_SQL,' AND (td.vchInstituteName LIKE "%',P_INSTITUTE_NAME,'%" OR td.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId IN (select ts.intCourseId from t_course_details ts where ts.bitDeletedFlag=0  and ts.vchCourseNameE LIKE "%',P_INSTITUTE_NAME,'%" ))) ');

			 END IF;

				                

			 IF(P_PUB_STATUS>0)THEN

					SET @P_SQL	= CONCAT(@P_SQL,' AND td.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId =',P_PUB_STATUS,') ');

			 END IF;

             IF(P_PIA_STATUS>0) THEN

					SET @P_SQL  = CONCAT(@P_SQL,' AND td.tinIsPIA=',P_PIA_STATUS);

		     END IF;

             

			 IF(CHAR_LENGTH(P_INSTITUTE_ALIAS)>0) THEN

					SET @P_SQL = CONCAT(@P_SQL,' AND td.vchInstituteAlias LIKE "%',P_INSTITUTE_ALIAS,'%" ');

			 END IF;

              

		    SET @P_SQL = CONCAT(@P_SQL,' AND td.tinArcStatus = ',P_ARC_STATUS);            

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;		

	   END IF;  

          

           

          

          

         IF(P_ACTION='FP') THEN		

			SELECT intInstituteId, vchInstituteName, vchInstituteNameO,intParentId,tinIsPIA FROM t_institute_details WHERE bitDeletedFlag=0 AND tinPublishStatus=2 AND tinIsPIA = 5 AND intParentId=0 ;		

	     END IF;  

         

         

         

		

		 IF(P_ACTION='CI') THEN		

				SELECT (SELECT COUNT(1) FROM t_institute_details where bitDeletedFlag=0 and tinArcStatus=0 AND tinPublishStatus=2 AND tinInstituteType=1 AND tinIsPIA=1) AS totGovtITI,(SELECT COUNT(1) FROM t_institute_details where bitDeletedFlag=0 and tinArcStatus=0 AND tinPublishStatus=2 AND tinInstituteType=1 AND tinIsPIA=2) AS totGovtPoly, (SELECT COUNT(1) FROM t_institute_details where bitDeletedFlag=0 and tinArcStatus=0 AND tinPublishStatus=2 AND tinIsPIA=3) AS totCenter, (SELECT COUNT(1) FROM t_institute_details where bitDeletedFlag=0 and tinArcStatus=0 AND tinPublishStatus=2 AND tinIsPIA=5) AS totPartner  ;

         END IF; 

         

         

         IF(P_ACTION='CAI') THEN		

				SELECT COUNT(1) as instCount,intIspia FROM t_institute_pia where bitDeletedFlag=0 AND  intInstdetailsId IN (SELECT intInstituteId FROM t_institute_details where bitDeletedflag=0 AND tinArcStatus=0 AND tinPublishStatus=2 AND tinIsPIA=3) GROUP BY intIspia ;

         END IF;  
   
   /* Fetch Institute Details By DIstrict Ids */
         IF(P_ACTION='VDI')THEN
			SET @P_SQL='SELECT intInstituteId,intDistrictId,(select vchDistrictname from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictname,(select vchDistrictnameO from m_district ts where ts.bitDeletedflag=0 and ts.intDistrictid=td.intDistrictId)as vchDistrictnameO, vchInstituteName, vchInstituteNameO, tinInstituteType, vchInstituteAlias,intEstYear, vchEmailId, vchPhoneno, vchWebsite,vchPinCode, vchImage, vchDescriptionE, vchDescriptionO,stmCreatedOn,vchPrincipalName,vchAddress,txtAddressO,vchPrincipalNameO,intCreatedBy,tinPublishStatus,tinArcStatus,vchMobileNo,tinIsPIA,intParentId FROM t_institute_details td WHERE bitDeletedFlag=0 AND tinPublishStatus=2 ';				 
			
				IF(P_DISTRICT_ID>0)THEN
				  SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',P_DISTRICT_ID);
				END IF; 
                
                
                IF(CHAR_LENGTH(P_INSTITUTE_NAME_O)>0)THEN
						SET @P_SQL	= CONCAT(@P_SQL,' AND (intDistrictId IN (',P_INSTITUTE_NAME_O,')) ');
					END IF;
                
				IF(CHAR_LENGTH(P_INSTITUTE_NAME)>0)THEN
					SET @P_SQL	= CONCAT(@P_SQL,' AND (vchInstituteName LIKE "%',P_INSTITUTE_NAME,'%" OR td.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId IN (select ts.intCourseId from t_course_details ts where ts.bitDeletedFlag=0  and ts.vchCourseNameE LIKE "%',P_INSTITUTE_NAME,'%" ))) ');
				END IF;
				                
                IF(P_PUB_STATUS>0)THEN
				  SET @P_SQL=CONCAT(@P_SQL,' AND td.intInstituteId IN (SELECT intInstituteId FROM t_institute_course TIC WHERE TIC.bitDeletedflag=0 AND TIC.intCourseId =',P_PUB_STATUS,') ');
				END IF; 
                IF(P_PIA_STATUS>0) THEN
                  SET @P_SQL = CONCAT(@P_SQL,' AND tinIsPIA=',P_PIA_STATUS);
			    END IF;
                
                IF(CHAR_LENGTH(P_INSTITUTE_ALIAS)>0) THEN
                   SET @P_SQL = CONCAT(@P_SQL,' AND td.vchInstituteAlias LIKE "%',P_INSTITUTE_ALIAS,'%" ');
                END IF;
		    SET @P_SQL=CONCAT(@P_SQL,' AND td.tinArcStatus = ',P_ARC_STATUS,' ORDER BY vchInstituteName ASC ');
			PREPARE STMT FROM @P_SQL;
			EXECUTE STMT;		
		  END IF;
     
     
	/*Action to Update New Training partner list from NIC
	  By Ashis Kumar Patra ON 06-Jun-2019
    */
          
          
           IF(P_ACTION='ULI')THEN
				TRUNCATE t_institute_details_tmp;
                TRUNCATE t_institute_course_tmp;
                	SET @P_STATUS	= 0;
              START TRANSACTION;
			IF(CHAR_LENGTH(P_QUERY)>0) THEN
			   SET @P_SQL=CONCAT('INSERT INTO t_institute_details_tmp(intDistrictId, vchInstituteCode,vchInstituteName, vchInstituteNameO, tinInstituteType, intEstYear, vchEmailId, vchPhoneno, vchWebsite, vchImage, vchAddress,txtAddressO,vchDescriptionE, vchDescriptionO,vchPrincipalName,vchPrincipalNameO,stmCreatedOn, intCreatedBy,vchInstituteAlias,vchMobileNo,tinIsPIA,vchPinCode,fltLat,fltLong,intParentId)VALUES ', P_QUERY);
                #select @P_SQL;
				PREPARE STMT FROM @P_SQL;
				EXECUTE STMT;	
				SET @P_STATUS	=  LAST_INSERT_ID(); 
                
             /*Course Data Update */   
                SET @Q_SQL=CONCAT('INSERT INTO t_institute_course_tmp(`vchInstituteCode`,`intInstituteId`,
`vchCourseId`) VALUES ', P_DETAILS);
 #select @Q_SQL;
			    PREPARE STMT1 FROM @Q_SQL;
			    EXECUTE STMT1; 
				SELECT  @P_STATUS; 
              /*Institute Mapping Id Update */     
                 SET SQL_SAFE_UPDATES=0;
 update t_institute_details_tmp tmp JOIN m_district md ON(tmp.intDistrictId=md.intMappingId) set  tmp.intDistrictId=md.intDistrictid;
 
 update t_institute_details ti JOIN t_institute_details_tmp tmp ON(ti.vchInsMapCode=tmp.vchInstituteCode) set  ti.intDistrictId=tmp.intDistrictid;

				COMMIT;	
                else
                SET  @P_STATUS=0;
				END IF; 
		  END IF;
          
  /* Action to Fetch Training partner list from NIC
	  By Ashis Kumar Patra ON 06-Jun-2019
	*/        
	
       IF(P_ACTION='FMD')THEN

			SET @P_SQL='SELECT intInstituteId,vchInstituteCode, vchInstituteName FROM t_institute_details_tmp td WHERE bitDeletedFlag=0 and tinIsPIA =3';	
                 IF(P_DISTRICT_ID>0)THEN

				  SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',P_DISTRICT_ID);

				END IF; 
		    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY vchInstituteName ASC ');

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;		

		  END IF;
          
	/* Action to update corresponding institute course data from NIC
	  By Ashis Kumar Patra ON 06-Jun-2019
	*/        
	
       IF(P_ACTION='UID')THEN
           START TRANSACTION; 
			SET @P_SQL='INSERT INTO t_institute_course (intInstituteId, intCourseId, intBatchNo, intBatchStrength,stmUpdatedOn)
 SELECT tmp.intInstituteId, tmp.intCourseId, 0,0,NOW() from t_institute_course_tmp tmp where not exists(select 1 from t_institute_course tc where tmp.intInstituteId=tc.intInstituteId and tmp.intCourseId=tc.intCourseId) and tmp.intInstituteId IS NOT NULL AND tmp.intCourseId IS NOT NULL ';	
        
			PREPARE STMT FROM @P_SQL;
			EXECUTE STMT;	
            COMMIT;
		

		  END IF;
          
          
	/*Action to Update ITI and Polytecnic institute list from SAMS
	  By Rahul Kumar Saw ON 08-AUG-2019
    */
          
          
           IF(P_ACTION='SID')THEN
				TRUNCATE t_sams_institute_details_tmp;
                TRUNCATE t_sams_institute_course_tmp;
                	SET @P_STATUS	= 0;
              START TRANSACTION;
			IF(CHAR_LENGTH(P_QUERY)>0) THEN
			   SET @P_SQL=CONCAT('INSERT INTO t_sams_institute_details_tmp(intDistrictId, intInstituteSamsCode,vchInstituteName, vchInstituteNameO, tinInstituteType, intEstYear, vchEmailId, vchPhoneno, vchWebsite, vchImage, vchAddress,txtAddressO,vchDescriptionE, vchDescriptionO,vchPrincipalName,vchPrincipalNameO,stmCreatedOn, intCreatedBy,vchInstituteAlias,vchMobileNo,tinIsPIA,vchPinCode,fltLat,fltLong,intParentId)VALUES ', P_QUERY);
                #select @P_SQL;
                
				PREPARE STMT FROM @P_SQL;
				EXECUTE STMT;	
				SET @P_STATUS	=  LAST_INSERT_ID(); 
                
             /*Course Data Update */   
                SET @Q_SQL=CONCAT('INSERT INTO t_sams_institute_course_tmp(`instituteCodeSAMS`,`intInstituteId`,
`intCourseIdSAMS`,`intBatchStrength`,`intBatchShiftNo`,`tinInstitituteType`,`stmCreatedOn`) VALUES ', P_DETAILS);
 #select @Q_SQL;
			    PREPARE STMT1 FROM @Q_SQL;
			    EXECUTE STMT1; 
				SELECT  @P_STATUS; 
              /*Institute Mapping Id Update */     
                 SET SQL_SAFE_UPDATES=0;
 update t_sams_institute_details_tmp tmp JOIN m_district md ON(tmp.intDistrictId=md.intSamsDistId) set  tmp.intDistrictId=md.intDistrictid;
 
 update t_institute_details ti JOIN t_sams_institute_details_tmp tmp ON(ti.vchInsMapCode=tmp.intInstituteSamsCode) set  ti.intDistrictId=tmp.intDistrictid;

				COMMIT;	
                else
                SET  @P_STATUS=0;
				END IF; 
		  END IF;
          
    /*Action to fetch Smas data from temporary table*/      
          IF(P_ACTION='SMD')THEN

			SET @P_SQL='SELECT intInstituteId,intInstituteSamsCode, vchInstituteName FROM t_sams_institute_details_tmp td WHERE bitDeletedFlag=0';	
                 IF(P_DISTRICT_ID>0)THEN

				  SET @P_SQL=CONCAT(@P_SQL,' AND intDistrictId=',P_DISTRICT_ID);

				 END IF; 
                 IF(P_INSTITUTE_TYPE>0)THEN

				  SET @P_SQL=CONCAT(@P_SQL,' AND tinIsPIA=',P_INSTITUTE_TYPE);

				END IF; 
                
		    SET @P_SQL=CONCAT(@P_SQL,' ORDER BY vchInstituteName ASC ');

			PREPARE STMT FROM @P_SQL;

			EXECUTE STMT;		

		  END IF;

        /* Action to update corresponding institute course data from SAMS
	  By Rahul Kumar Saw ON 09-Aug-2019
	*/        
	
       IF(P_ACTION='AID')THEN
           START TRANSACTION; 
			SET @P_SQL='INSERT INTO t_institute_course (intInstituteId, intCourseId, intBatchNo, intBatchStrength,stmUpdatedOn)
 SELECT tmp.intInstituteId, tmp.intCourseId, tmp.intBatchShiftNo,tmp.intBatchStrength,NOW() from t_sams_institute_course_tmp tmp where not exists(select 1 from t_institute_course tc where tmp.intInstituteId=tc.intInstituteId and tmp.intCourseId=tc.intCourseId) and tmp.intInstituteId IS NOT NULL AND tmp.intCourseId IS NOT NULL ';	
        
			PREPARE STMT FROM @P_SQL;
			EXECUTE STMT;	
            COMMIT;
		

		  END IF;

END