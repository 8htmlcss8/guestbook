DROP TABLE IF EXISTS ex_guestbook;
CREATE TABLE ex_guestbook (
  id mediumint(8) unsigned NOT NULL auto_increment,
  nickname char(15) NOT NULL default '',
  email varchar(100) NOT NULL default '',
  content text NOT NULL,
  createtime int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

insert into ex_guestbook values ( 1, 'admin', 'admin@163.com', '留言测试', 1353575532 );
insert into ex_guestbook values ( 2, 'user', 'user@163.com', '留言测试', 1353575332 );
insert into ex_guestbook values ( 3, 'tom', 'tom@163.com', '留言测试', 1353575522 );
insert into ex_guestbook values ( 4, 'cat', 'cat@163.com', '留言测试', 1353575132 );
insert into ex_guestbook values ( 5, 'kitty', 'kitty@163.com', '留言测试', 1353574532 );
insert into ex_guestbook values ( 6, 'zhangshang', 'zhangshang@163.com', '留言测试', 1353573432 );
insert into ex_guestbook values ( 7, 'lishi', 'lishi@163.com', '留言测试', 1353572332 );
insert into ex_guestbook values ( 8, 'hello', 'hello@163.com', '留言测试', 1353574332 );
insert into ex_guestbook values ( 9, 'jack', 'jack@163.com', '留言测试', 1353574312 );
insert into ex_guestbook values ( 10, 'lily', 'lily@163.com', '留言测试', 1353574212 );

DROP TABLE IF EXISTS ex_user;
CREATE TABLE ex_user (
  uid mediumint(8) unsigned NOT NULL auto_increment,
  username char(15) NOT NULL default '',
  password char(32) NOT NULL default '',
  email varchar(40) NOT NULL default '',
  regdate int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (uid)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
