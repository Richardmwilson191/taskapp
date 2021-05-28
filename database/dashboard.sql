create table dashboard (
  db_id varchar(6) NOT NULL,
  db_name varchar(32) NOT NULL,
  created_by varchar(32) NOT NULL,
  created_dt DATE NOT NULL DEFAULT NOW(),
  primary key (db_id)
);
create table dashboard_user (
  db_id varchar(6) NOT NULL,
  username varchar(32) NOT NULL,
  active_flg char default 'y'
);
create table project (
  p_id varchar(6) NOT NULL,
  p_name varchar(32) NOT NULL,
  db_id varchar(6) NOT NULL,
  --dropdown
  p_start_dt date NOT NULL,
  p_end_dt date,
  p_status varchar(16) NOT NULL,
  --dropdown
  created_dt DATE NOT NULL DEFAULT NOW(),
  created_by varchar(32) NOT NULL,
  primary key (p_id)
);
create table project_user (
  p_id varchar(6) NOT NULL,
  username varchar(32) NOT NULL,
  active_flg char default 'y'
);