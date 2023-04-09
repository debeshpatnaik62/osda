CREATE  FUNCTION `replace_spaceWithHyphen`(textToReplace varchar(256)) RETURNS text CHARSET latin1
BEGIN
DECLARE occHyphen int; 
DECLARE occSpace int; 
set occHyphen = 1;
set occSpace = 1;
WHILE (occHyphen <> 0 || occSpace <> 0) DO
        SELECT LOCATE('--',textToReplace) into occHyphen;
        SELECT LOCATE(' ',textToReplace) into occSpace;
        SELECT REPLACE(textToReplace,',',' ') into textToReplace;
        SELECT REPLACE(textToReplace,' ','-') into textToReplace;
        SELECT REPLACE(textToReplace,'--','-') into textToReplace;
        SELECT REPLACE(textToReplace,'---','-') into textToReplace;
    END WHILE;
  RETURN textToReplace;
END