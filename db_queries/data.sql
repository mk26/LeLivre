--LELIVRE DATABASE DATA - COEN280 PROJECT - GROUP 8 - KARTHIK & ZHEN

--Authors
INSERT INTO AUTHOR(A_Name, Birth_Date, Birth_Place, Biography)
VALUES ('Annie Baker', '03-24-1982','Boston, USA', 'Annie Baker grew up in Amherst, Massachusetts, and graduated from the Department of Dramatic Writing at New York University Tisch School of the Arts.She earned her MFA from Brooklyn College.');

INSERT INTO AUTHOR(A_Name, Birth_Date, Birth_Place, Biography)
VALUES ('Blake Crouch', '05-14-1972','Denver, USA', 'Blake Crouch is the author of over a dozen bestselling suspense novels. His Wayward Pines series is being produced as a TV show by M. Night Shyamalan and his short fiction has appeared in numerous short story anthologies, Ellery Queens Mystery Magazine, Alfred Hitchcocks Mystery Magazine and many other publications will be airing on Fox in 2014.');

INSERT INTO AUTHOR(A_Name, Birth_Date, Birth_Place, Biography)
VALUES ('Daryl Gregory', '01-21-1965','Chicago, USA', 'Daryl Gregory (born 1965) is an American science fiction and comic book author. Gregory is a 1988 alumnus of the Michigan State University Clarion science fiction workshop, and won the 2009 Crawford Award for his novel Pandemonium.');

INSERT INTO AUTHOR(A_Name, Birth_Date, Birth_Place, Biography)
VALUES ('Jake Anderson', '09-06-1972','Seattle, USA', 'Jake Anderson is an American deck boss aboard the fishing vessel Northwestern. Since 2007, Anderson has been featured in all seasons of the Discovery Channel documentary television series Deadliest Catch.');

INSERT INTO AUTHOR(A_Name, Birth_Date, Birth_Place, Biography)
VALUES ('John Green', '08-24-1977','Indianapolis, USA', 'John Michael Green is an American author of young adult fiction, YouTube video blogger (vlogger) and creator of online educational videos. He won the 2006 Printz Award for his debut novel, Looking for Alaska, and his most recent novel, The Fault in Our Stars debuted at number 1 on The New York Times Best Seller list in January 2012. In 2014 Green was included in Time magazine list of the 100 most influential people in the world.');

INSERT INTO AUTHOR(A_Name, Birth_Date, Birth_Place, Biography)
VALUES ('Lene Kaaberbol', '12-16-1960','Copenhagen, Danmark', 'Lene Kaaberbøl is a Danish writer living in Copenhagen, Denmark. Her work primarily consists of childrens fantasy series and crime fiction for adults. She received the Nordic Childrens Book Prize in 2004.');

INSERT INTO AUTHOR(A_Name, Birth_Date, Birth_Place, Biography)
VALUES ('Michael Lewis', '10-15-1960','New Orlean, USA', 'Michael Monroe Lewis is an American non-fiction author and financial journalist. His bestselling books include Liars Poker (1989), The New New Thing (2000), Moneyball: The Art of Winning an Unfair Game (2003), The Blind Side: Evolution of a Game (2006), Panic (2008), Home Game: An Accidental Guide to Fatherhood (2009), The Big Short: Inside the Doomsday Machine (2010), and Boomerang (2011). He has also been a contributing editor to Vanity Fair since 2009. In 2014, his book Flash Boys, which looked at the high-frequency trading sector of Wall Street, was released.');

INSERT INTO AUTHOR(A_Name, Birth_Date, Birth_Place, Biography)
VALUES ('Paulo Coelho', '08-29-1947','Rio de Janiero, Brazil', 'Paulo Coelho is a Brazilian lyricist and novelist. He has become one of the most widely read authors in the world today.He is the recipient of numerous international awards, amongst them the Crystal Award by the World Economic Forum. The Alchemist, his most famous novel, has been translated into 67 languages.The author has sold 150 million copies worldwide.');

INSERT INTO AUTHOR(A_Name, Birth_Date, Birth_Place, Biography)
VALUES ('Stacey Joy Netzel', '06-27-1968','Madison, USA', 'Stacey Joy Netzel fell in love with books at a young age, so for her the graduation to writing them was natural. A member of Romance Writers of America (RWA) and Wisconsin Romance Writers (WisRWA), she credits her parents for encouraging her dreams of becoming a published author, as well as the very talented friends she’s made in WisRWA since joining in 2004. Her Christmas anthology, MISTLETOE RULES, took 1st place in WisRWs 2010 Write Touch Readers Award. Check out her romantic suspense Colorado Trust Series, Trust in the Lawe, Shattered trust, and Shadowed Trust. Other titles include: Lost In Italy, Ditched Again, Welcome to Redemption Series, Chasin’ Mason, Dragonfly Dreams, If Tombstones Could Talk.');

INSERT INTO AUTHOR(A_Name, Birth_Date, Birth_Place, Biography)
VALUES ('Valerie Gordon', '03-29-1974','Greenwich, USA', 'Since 2003, Valerie Gordon has provided Angelenos with award-winning sweets and baked goods from her boutique in Silverlake and her booths at the Santa Monica and Hollywood farmers’ markets. With two restaurants opening in 2013 and this comprehensive cookbook filled with her beloved recipes, now even more people can eat and bake the Valerie way.');

--Publishers
INSERT INTO PUBLISHING_HOUSE VALUES ('HarperCollins', '10 East 53rd Street, New York, NY 10012');
INSERT INTO PUBLISHING_HOUSE VALUES ('Dutton Books', '100 Union Street, Boston, MA 02201');
INSERT INTO PUBLISHING_HOUSE VALUES ('W. W. Norton & Company', '500 Fifth Avenue, New York, NY 10110');
INSERT INTO PUBLISHING_HOUSE VALUES ('CreateSpaceIndependent Publishing Platform',    '1200 12th Ave, Seattle, WA 98144');
INSERT INTO PUBLISHING_HOUSE VALUES ('Coventry House Publishing', '5520 Sentinel Falls St, Dublin, OH 43016');
INSERT INTO PUBLISHING_HOUSE VALUES ('Thomas & Mercer', '234 23rd Ave, Seattle, WA 98004');
INSERT INTO PUBLISHING_HOUSE VALUES ('Tor Books', '801 Flatiron Building, New York, NY 10001');
INSERT INTO PUBLISHING_HOUSE VALUES ('Soho Crime', '233 Spring Street, New York, NY 10013');
INSERT INTO PUBLISHING_HOUSE VALUES ('Artisan', '225 Varick Stree, New York, NY 10014');

--Books
INSERT INTO BOOK VALUES ('978-0061122415','The Alchemist',2006,8.64,'Paperback',235,'HarperCollins');
INSERT INTO BOOK VALUES ('978-0062502179','The Alchemist',2003,14.57,'Hardcover',57,'HarperCollins');
INSERT INTO BOOK VALUES ('978-0062502178','The Alchemist',2006,5.99,'Ebook',NULL,'HarperCollins');
INSERT INTO BOOK VALUES ('978-0525478812','The Fault in Our Stars',2014,10,'Hardcover',521,'Dutton Books');
INSERT INTO BOOK VALUES ('978-0142424179','The Fault in Our Stars',2014,8.1,'Paperback',3,'Dutton Books');
INSERT INTO BOOK VALUES ('978-0142424173','The Fault in Our Stars',2014,7.4,'Ebook',NULL,'Dutton Books');
INSERT INTO BOOK VALUES ('978-0393244663','Flash Boys: A Wall Street Revolt',2014,16.77,'Hardcover',234,'W. W. Norton & Company');
INSERT INTO BOOK VALUES ('978-0393244669','Flash Boys: A Wall Street Revolt',2014,13.64,'Ebook',NULL,'W. W. Norton & Company');
INSERT INTO BOOK VALUES ('978-1466410480','Lost In Italy',2011,12.59,'Paperback',42,'CreateSpaceIndependent Publishing Platform');
INSERT INTO BOOK VALUES ('978-1466410473','Lost In Italy',2013,4.99,'Ebook',NULL,'CreateSpaceIndependent Publishing Platform');
INSERT INTO BOOK VALUES ('978-0615948768','Replapse',2014,17.09,'Paperback',4,'Coventry House Publishing');
INSERT INTO BOOK VALUES ('978-0615948763','Replapse',2014,8.99,'Ebook',NULL,'Coventry House Publishing');
INSERT INTO BOOK VALUES ('978-1612183954','Pines',2012,8.97,'Paperback',342,'Thomas & Mercer');
INSERT INTO BOOK VALUES ('978-1612183952','Pines',2013,4.99,'Ebook',NULL,'Thomas & Mercer');
INSERT INTO BOOK VALUES ('978-0765336927','After Party',2014,17.85,'Hardcover',23,'Tor Books');
INSERT INTO BOOK VALUES ('978-0765336922','After Party',2014,11.04,'Ebook',NULL,'Tor Books');
INSERT INTO BOOK VALUES ('978-0156947981','The Boy in the Suitcase',2011,12.58,'Paperback',1,'Soho Crime');
INSERT INTO BOOK VALUES ('978-0156947720','The Boy in the Suitcase',2011,18.89,'Hardcover',78,'Soho Crime');
INSERT INTO BOOK VALUES ('978-0156947723','The Boy in the Suitcase',2011,7.99,'Ebook',NULL,'Soho Crime');
INSERT INTO BOOK VALUES ('978-1579654689','Sweet',2013,25.09,'Hardcover',96,'Artisan');
INSERT INTO BOOK VALUES ('978-1579654682','Sweet',2013,16.99,'Ebook',NULL,'Artisan');
INSERT INTO BOOK VALUES ('978-1559364584','The Flick',2014,12.99,'Paperback',63,'Thomas & Mercer');

--Authors of books
INSERT INTO BOOK_AUTHOR VALUES ('978-0061122415',9);
INSERT INTO BOOK_AUTHOR VALUES ('978-0062502179',9);
INSERT INTO BOOK_AUTHOR VALUES ('978-0062502178',9);
INSERT INTO BOOK_AUTHOR VALUES ('978-0525478812',6);
INSERT INTO BOOK_AUTHOR VALUES ('978-0142424179',6);
INSERT INTO BOOK_AUTHOR VALUES ('978-0142424173',6);
INSERT INTO BOOK_AUTHOR VALUES ('978-0393244663',8);
INSERT INTO BOOK_AUTHOR VALUES ('978-0393244669',8);
INSERT INTO BOOK_AUTHOR VALUES ('978-1466410480',10);
INSERT INTO BOOK_AUTHOR VALUES ('978-1466410473',10);
INSERT INTO BOOK_AUTHOR VALUES ('978-0615948768',5);
INSERT INTO BOOK_AUTHOR VALUES ('978-0615948763',5);
INSERT INTO BOOK_AUTHOR VALUES ('978-1612183954',3);
INSERT INTO BOOK_AUTHOR VALUES ('978-1612183952',3);
INSERT INTO BOOK_AUTHOR VALUES ('978-0765336927',4);
INSERT INTO BOOK_AUTHOR VALUES ('978-0765336922',4);
INSERT INTO BOOK_AUTHOR VALUES ('978-0156947981',7);
INSERT INTO BOOK_AUTHOR VALUES ('978-0156947981',1);
INSERT INTO BOOK_AUTHOR VALUES ('978-0156947720',7);
INSERT INTO BOOK_AUTHOR VALUES ('978-0156947720',1);
INSERT INTO BOOK_AUTHOR VALUES ('978-0156947723',7);
INSERT INTO BOOK_AUTHOR VALUES ('978-0156947723',1);
INSERT INTO BOOK_AUTHOR VALUES ('978-1579654689',10);
INSERT INTO BOOK_AUTHOR VALUES ('978-1579654682',10);
INSERT INTO BOOK_AUTHOR VALUES ('978-1559364584',2);

--Customers
INSERT INTO CUSTOMER VALUES ('jane2','jane2@gmail.com','hellodb','Jane Wong','12-12-1988');
INSERT INTO CUSTOMER VALUES ('peter89','peter89@hotmail.com','hellodb','Peter Anderson','08-04-1990');
INSERT INTO CUSTOMER VALUES ('lily12','lily12@yahoo.com','hellodb','Lily Rayman','07-05-1991');
INSERT INTO CUSTOMER VALUES ('rick09','rick09@scu.edu','hellodb','Rick Brown','01-23-1959');
INSERT INTO CUSTOMER VALUES ('ryan24', 'ryan24@gmail.com','hellodb','Ryan Willton','06-30-1970');

--Credit card info
INSERT INTO CREDITCARD VALUES ('Jane Brown','visa','100 44st, New York, NY 10002','jane2','4117123443210000','09-28-2015');
INSERT INTO CREDITCARD VALUES ('Jane Brown','visa','100 44st, New York, NY 10002','jane2','4207567887659999','02-28-2018');
INSERT INTO CREDITCARD VALUES ('Lily Liu','visa','12 Greary St, San Francisco, CA 94026','lily12','5248098778901111','04-28-2016');
INSERT INTO CREDITCARD VALUES ('Peter Smith','master','90 N 1st, Sunnyvale, CA 95892','peter89','4888567887652222','08-28-2015');
INSERT INTO CREDITCARD VALUES ('Rick Johnson','master','2234 Bethesda st, Annapolis, MD 32041','rick09','4888098778906666','11-28-2017');
INSERT INTO CREDITCARD VALUES ('Ryan Longwood','visa','19 W fourth st, New York, NY 10012','ryan24','6011234554326666','07-28-2017');
INSERT INTO CREDITCARD VALUES ('Ryan Longwood','visa','19 W fourth st, New York, NY 10012','ryan24','4888123443217777','04-28-2017');
INSERT INTO CREDITCARD VALUES ('Ryan Longwood','master','19 W fourth st, New York, NY 10012','ryan24','4117567887653333','12-28-2019');

--Genres
INSERT INTO GENRE VALUES ('Adventure');
INSERT INTO GENRE VALUES ('Art');
INSERT INTO GENRE VALUES ('Biography');
INSERT INTO GENRE VALUES ('Business');
INSERT INTO GENRE VALUES ('Classics');
INSERT INTO GENRE VALUES ('Comics');
INSERT INTO GENRE VALUES ('Crime');
INSERT INTO GENRE VALUES ('Education');
INSERT INTO GENRE VALUES ('Fables');
INSERT INTO GENRE VALUES ('Fantasy');
INSERT INTO GENRE VALUES ('Fiction');
INSERT INTO GENRE VALUES ('Food');
INSERT INTO GENRE VALUES ('Health');
INSERT INTO GENRE VALUES ('History');
INSERT INTO GENRE VALUES ('Horror');
INSERT INTO GENRE VALUES ('Music');
INSERT INTO GENRE VALUES ('Non-fiction');
INSERT INTO GENRE VALUES ('Philosophy');
INSERT INTO GENRE VALUES ('Poetry');
INSERT INTO GENRE VALUES ('Politics');
INSERT INTO GENRE VALUES ('Religion');
INSERT INTO GENRE VALUES ('Romance');
INSERT INTO GENRE VALUES ('Sci-fiction');
INSERT INTO GENRE VALUES ('Science');
INSERT INTO GENRE VALUES ('Society');
INSERT INTO GENRE VALUES ('Sports');
INSERT INTO GENRE VALUES ('Travel');

--Book's genres
INSERT INTO GENRE_BOOK VALUES ('Fiction','978-0061122415');
INSERT INTO GENRE_BOOK VALUES ('Religion','978-0061122415');
INSERT INTO GENRE_BOOK VALUES ('Religion','978-0062502179');
INSERT INTO GENRE_BOOK VALUES ('Fiction','978-0062502179');
INSERT INTO GENRE_BOOK VALUES ('Fiction','978-0062502178');
INSERT INTO GENRE_BOOK VALUES ('Religion','978-0062502178');
INSERT INTO GENRE_BOOK VALUES ('Fiction','978-0525478812');
INSERT INTO GENRE_BOOK VALUES ('Adventure','978-0525478812');
INSERT INTO GENRE_BOOK VALUES ('Fiction','978-0142424179');
INSERT INTO GENRE_BOOK VALUES ('Adventure','978-0142424179');
INSERT INTO GENRE_BOOK VALUES ('Fiction','978-0142424173');
INSERT INTO GENRE_BOOK VALUES ('Adventure','978-0142424173');
INSERT INTO GENRE_BOOK VALUES ('History','978-0393244663');
INSERT INTO GENRE_BOOK VALUES ('Business','978-0393244663');
INSERT INTO GENRE_BOOK VALUES ('History','978-0393244669');
INSERT INTO GENRE_BOOK VALUES ('Business','978-0393244669');
INSERT INTO GENRE_BOOK VALUES ('Romance','978-1466410480');
INSERT INTO GENRE_BOOK VALUES ('Travel','978-1466410480');
INSERT INTO GENRE_BOOK VALUES ('Romance','978-1466410473');
INSERT INTO GENRE_BOOK VALUES ('Travel','978-0615948768');
INSERT INTO GENRE_BOOK VALUES ('Sports','978-0615948768');
INSERT INTO GENRE_BOOK VALUES ('Horror','978-1612183954');
INSERT INTO GENRE_BOOK VALUES ('Fantasy','978-1612183954');
INSERT INTO GENRE_BOOK VALUES ('Horror','978-1612183952');
INSERT INTO GENRE_BOOK VALUES ('Fantasy','978-1612183952');
INSERT INTO GENRE_BOOK VALUES ('Fiction','978-0765336927');
INSERT INTO GENRE_BOOK VALUES ('Adventure','978-0765336927');
INSERT INTO GENRE_BOOK VALUES ('Fiction','978-0765336922');
INSERT INTO GENRE_BOOK VALUES ('Adventure','978-0765336922');
INSERT INTO GENRE_BOOK VALUES ('Fiction','978-0156947981');
INSERT INTO GENRE_BOOK VALUES ('Crime','978-0156947981');
INSERT INTO GENRE_BOOK VALUES ('Horror','978-0156947981');
INSERT INTO GENRE_BOOK VALUES ('Fiction','978-0156947720');
INSERT INTO GENRE_BOOK VALUES ('Crime','978-0156947720');
INSERT INTO GENRE_BOOK VALUES ('Horror','978-0156947720');
INSERT INTO GENRE_BOOK VALUES ('Fiction','978-0156947723');
INSERT INTO GENRE_BOOK VALUES ('Crime','978-0156947723');
INSERT INTO GENRE_BOOK VALUES ('Horror','978-0156947723');
INSERT INTO GENRE_BOOK VALUES ('Food','978-1579654689');
INSERT INTO GENRE_BOOK VALUES ('Food','978-1579654682');
INSERT INTO GENRE_BOOK VALUES ('Art','978-1559364584');
INSERT INTO GENRE_BOOK VALUES ('Politics','978-1559364584');
INSERT INTO GENRE_BOOK VALUES ('Society','978-1559364584');

--Customer's preferred Genres
INSERT INTO GENRE_CUSTOMER VALUES ('Fiction','jane2');
INSERT INTO GENRE_CUSTOMER VALUES ('Religion','jane2');
INSERT INTO GENRE_CUSTOMER VALUES ('Adventure','jane2');
INSERT INTO GENRE_CUSTOMER VALUES ('Business','jane2');
INSERT INTO GENRE_CUSTOMER VALUES ('History','lily12');
INSERT INTO GENRE_CUSTOMER VALUES ('Romance','lily12');
INSERT INTO GENRE_CUSTOMER VALUES ('Business','lily12');
INSERT INTO GENRE_CUSTOMER VALUES ('Fantasy','lily12');
INSERT INTO GENRE_CUSTOMER VALUES ('Business','peter89');
INSERT INTO GENRE_CUSTOMER VALUES ('Sports','peter89');
INSERT INTO GENRE_CUSTOMER VALUES ('Travel','peter89');
INSERT INTO GENRE_CUSTOMER VALUES ('Fiction','peter89');
INSERT INTO GENRE_CUSTOMER VALUES ('Horror','rick09');
INSERT INTO GENRE_CUSTOMER VALUES ('History','rick09');
INSERT INTO GENRE_CUSTOMER VALUES ('Biography','rick09');
INSERT INTO GENRE_CUSTOMER VALUES ('Food','rick09');
INSERT INTO GENRE_CUSTOMER VALUES ('Sci-fiction','ryan24');
INSERT INTO GENRE_CUSTOMER VALUES ('Horror','ryan24');
INSERT INTO GENRE_CUSTOMER VALUES ('Business','ryan24');
INSERT INTO GENRE_CUSTOMER VALUES ('Romance','ryan24');

--Reviews for authors
INSERT INTO REVIEW_AUTHOR VALUES ('jane2',1,'This author is on my fav.','5');
INSERT INTO REVIEW_AUTHOR VALUES ('jane2',3,'Love the author','4');
INSERT INTO REVIEW_AUTHOR VALUES ('peter89',8,'All his work are all worth reading!','5');
INSERT INTO REVIEW_AUTHOR VALUES ('peter89',7,'I would recommend this author to my friends!','5');
INSERT INTO REVIEW_AUTHOR VALUES ('rick09',4,'The author is fair.','3');
INSERT INTO REVIEW_AUTHOR VALUES ('rick09',6,'His view is very insightful.','5');
INSERT INTO REVIEW_AUTHOR VALUES ('ryan24',10,'This author is Strongly recommended by my English professor.','5');
INSERT INTO REVIEW_AUTHOR VALUES ('ryan24',8,'My database professor would love him!','4');
INSERT INTO REVIEW_AUTHOR VALUES ('lily12',10,'Great author with books!','4');
INSERT INTO REVIEW_AUTHOR VALUES ('lily12',10,'Her story is always very exotic.','5');

--Reviews for books
INSERT INTO REVIEW_BOOK VALUES ('jane2','978-0062502178','This book is on my wish list.','4');
INSERT INTO REVIEW_BOOK VALUES ('jane2','978-0525478812','Love the book!','5');
INSERT INTO REVIEW_BOOK VALUES ('peter89','978-0525478812','DefInitely worth reading!','5');
INSERT INTO REVIEW_BOOK VALUES ('peter89','978-0393244663','I would recommend this book to my friends','5');
INSERT INTO REVIEW_BOOK VALUES ('rick09','978-1466410480','The book is fair.','3');
INSERT INTO REVIEW_BOOK VALUES ('rick09','978-1466410480','Not very much to my interest.','2');
INSERT INTO REVIEW_BOOK VALUES ('ryan24','978-0765336927','Strongly recommended by my English professor.','5');
INSERT INTO REVIEW_BOOK VALUES ('ryan24','978-0156947981','My database professor would love it!','4');
INSERT INTO REVIEW_BOOK VALUES ('lily12','978-0062502178','Nice one!','4');
INSERT INTO REVIEW_BOOK VALUES ('lily12','978-1579654682','Great story','5');
INSERT INTO REVIEW_BOOK VALUES ('lily12','978-1612183954','It was okay.','3');

--Transactions
INSERT INTO TRANSACTION VALUES ('jane2',1,'978-1579654682',1,16.99,'4117123443210000','05-01-2014');
INSERT INTO TRANSACTION VALUES ('jane2',1,'978-0393244669',1,13.64,'4117123443210000','05-01-2014');
INSERT INTO TRANSACTION VALUES ('lily12',2,'978-1466410480',1,12.59,'5248098778901111','05-02-2014');
INSERT INTO TRANSACTION VALUES ('lily12',2,'978-0615948768',1,17.09,'5248098778901111','05-02-2014');
INSERT INTO TRANSACTION VALUES ('peter89',3,'978-1466410473',1,4.99,'4888567887652222','05-03-2014');
INSERT INTO TRANSACTION VALUES ('peter89',3,'978-0615948763',1,8.99,'4888567887652222','05-03-2014');
INSERT INTO TRANSACTION VALUES ('rick09',4,'978-1612183954',1,8.97,'4888098778906666','05-04-2014');
INSERT INTO TRANSACTION VALUES ('rick09',4,'978-0765336927',1,17.85,'4888098778906666','05-04-2014');
INSERT INTO TRANSACTION VALUES ('ryan24',5,'978-0156947981',1,12.58,'4888123443217777','05-05-2014');
INSERT INTO TRANSACTION VALUES ('ryan24',5,'978-1579654689',1,25.09,'4888123443217777','05-05-2014');
INSERT INTO TRANSACTION VALUES ('ryan24',5,'978-1559364584',1,12.99,'4888123443217777','05-05-2014');