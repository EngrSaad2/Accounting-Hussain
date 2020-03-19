ALTER TABLE entries ADD created_by INT  AFTER entryStatusComment;

ALTER TABLE accounts ADD created_by INT  AFTER accountStatement;