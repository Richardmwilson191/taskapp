select * from project as p join project_user as pu on p.p_id = pu.p_id where username = 'kelvin' and active_flg = 'y';