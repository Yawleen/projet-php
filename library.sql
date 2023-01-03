

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `id_author` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255)   NOT NULL,
  PRIMARY KEY (`id_author`)
) ENGINE=InnoDB AUTO_INCREMENT=75 ;



INSERT INTO `authors` (`id_author`, `full_name`) VALUES
(1, "Suzanne Collins"),
(2, "J.K. Rowling"),
(3, "Harper Lee"),
(4, "Jane Austen"),
(5, "Stephenie Meyer"),
(6, "Markus Zusak "),
(7, "George Orwell"),
(8, "C.S. Lewis"),
(9, "J.R.R. Tolkien"),
(10, "Margaret Mitchell"),
(11, "John Green "),
(12, "Douglas Adams"),
(13, "Shel Silverstein"),
(14, "Emily Brontë"),
(15, "Dan Brown "),
(16, "Arthur Golden"),
(17, "Oscar Wilde"),
(18, "Lewis Carroll"),
(19, "Charlotte Brontë"),
(20, "Victor Hugo"),
(21, "Ray Bradbury"),
(22, "Veronica Roth "),
(23, "William Golding"),
(24, "William Shakespeare"),
(25, "Paulo Coelho "),
(26, "Fyodor Dostoyevsky"),
(27, "Stephen Chbosky"),
(28, "F. Scott Fitzgerald"),
(29, "Cassandra Clare "),
(30, "Orson Scott Card"),
(31, "Kathryn Stockett "),
(32, "L.M. Montgomery"),
(33, "Antoine de Saint-Exupéry"),
(34, "E.B. White"),
(35, "John Steinbeck"),
(36, "Audrey Niffenegger "),
(37, "Bram Stoker"),
(38, "Aldous Huxley"),
(39, "Gabriel García Márquez"),
(40, "J.D. Salinger"),
(41, "William Goldman"),
(42, "Rick Riordan "),
(43, "Frances Hodgson Burnett"),
(44, "Khaled Hosseini "),
(45, "Madeleine L\'Engle"),
(46, "George R.R. Martin"),
(47, "Mark Twain"),
(48, "Alice Sebold"),
(49, "S.E. Hinton "),
(50, "Maurice Sendak"),
(51, "Dr. Seuss"),
(52, "Homer"),
(53, "Yann Martel"),
(54, "Charles Dickens"),
(55, "Sara Gruen "),
(56, "Vladimir Nabokov"),
(57, "Kurt Vonnegut Jr."),
(58, "Mary Wollstonecraft Shelley"),
(59, "Margaret Atwood "),
(60, "Lois Lowry "),
(61, "Joseph Heller"),
(62, "Frank Herbert"),
(63, "Ken Follett "),
(64, "Stephen King "),
(65, "Arthur Conan Doyle"),
(66, "Richard Adams"),
(67, "Louisa May Alcott"),
(68, "Sylvia Plath"),
(69, "Ken Kesey"),
(70, "Leo Tolstoy"),
(71, "Diana Gabaldon "),
(72, "Jodi Picoult "),
(73, "Roald Dahl"),
(74, "Stieg Larsson");


DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id_book` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255)   NOT NULL,
  `id_author` int NOT NULL,
  `id_genre` int NOT NULL,
  `resume` varchar(255)   NOT NULL,
  `release_date` date NOT NULL,
  `id_editor` int NOT NULL,
  `pages` int NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `media` varchar(255) NOT NULL,
  PRIMARY KEY (`id_book`)
) ENGINE=InnoDB AUTO_INCREMENT=80 ;


INSERT INTO `books` (`id_book`, `title`, `id_author`, `id_genre`, `resume`, `release_date`, `id_editor`, `pages`, `isbn`, `media`) VALUES
(1, "The Hunger Games", 1, 1, "WINNING MEANS FAME AND FORTUNE.LOSING MEANS CERTAIN DEATH.THE HUNGER GAMES HAVE BEGUN. . . .In the ruins of a place once known as North America lies the nation of Panem, a shining Capitol surrounded by twelve outlying districts. The Capitol is h...", "2008-09-14", 1, 374, "9780439023481", "https://covers.openlibrary.org/b/isbn/9780439023481-M.jpg"),
(2, "Harry Potter and the Order of the Phoenix", 2, 2, "There is a door at the end of a silent corridor. And it’s haunting Harry Pottter’s dreams. Why else would he be waking in the middle of the night, screaming in terror?Harry has a lot on his mind for this, his fifth year at Hogwarts: a Defense Ag...", "2004-09-28", 2, 870, "9780439358071", "https://covers.openlibrary.org/b/isbn/9780439358071-M.jpg"),
(3, "To Kill a Mockingbird", 3, 3, "The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it, To Kill A Mockingbird became both an instant bestseller and a critical success when it was first published in 1960. It went on to win t...", "2006-05-23", 3, 324, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(4, "Pride and Prejudice", 4, 3, "Alternate cover edition of ISBN 9780679783268Since its immediate success in 1813, Pride and Prejudice has remained one of the most popular novels in the English language. Jane Austen called this brilliant work \'her own darling child\' and its viv...", "2000-10-10", 4, 279, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(5, "Twilight", 5, 1, "About three things I was absolutely positive.\n\nFirst, Edward was a vampire.\n\nSecond, there was a part of him—and I didn\'t know how dominant that part might be—that thirsted for my blood.\n\nAnd third, I was unconditionally and irrevocably in love ...", "2006-09-06", 5, 501, "9780316015844", "https://covers.openlibrary.org/b/isbn/9780316015844-M.jpg"),
(6, "The Book Thief", 6, 4, "Librarian\'s note: An alternate cover edition can be found hereIt is 1939. Nazi Germany. The country is holding its breath. Death has never been busier, and will be busier still.By her brother\'s graveside, Liesel\'s life is changed when she picks ...", "2006-03-14", 6, 552, "9780375831003", "https://covers.openlibrary.org/b/isbn/9780375831003-M.jpg"),
(7, "Animal Farm", 7, 3, "Librarian\'s note: There is an Alternate Cover Edition for this edition of this book here.A farm is taken over by its overworked, mistreated animals. With flaming idealism and stirring slogans, they set out to create a paradise of progress, justi...", "1996-04-28", 7, 141, "9780451526342", "https://covers.openlibrary.org/b/isbn/9780451526342-M.jpg"),
(8, "The Chronicles of Narnia", 8, 2, "Journeys to the end of the world, fantastic creatures, and epic battles between good and evil—what more could any reader ask for in one book? The book that has it all is The Lion, the Witch and the Wardrobe, written in 1949 by Clive Staples Lewi...", "2002-09-16", 8, 767, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(9, "J.R.R. Tolkien 4-Book Boxed Set: The Hobbit and The Lord of the Rings", 9, 2, "This four-volume, boxed set contains J.R.R. Tolkien\'s epic masterworks The Hobbit and the three volumes of The Lord of the Rings (The Fellowship of the Ring, The Two Towers, and The Return of the King).In The Hobbit, Bilbo Baggins is whisked awa...", "2012-09-25", 9, 1728, "9780345538376", "https://covers.openlibrary.org/b/isbn/9780345538376-M.jpg"),
(10, "Gone with the Wind", 10, 3, "Scarlett O\'Hara, the beautiful, spoiled daughter of a well-to-do Georgia plantation owner, must use every means at her disposal to claw her way out of the poverty she finds herself in after Sherman\'s March to the Sea.", "1999-04-01", 10, 1037, "9780446675536", "https://covers.openlibrary.org/b/isbn/9780446675536-M.jpg"),
(11, "The Fault in Our Stars", 11, 1, "Despite the tumor-shrinking medical miracle that has bought her a few years, Hazel has never been anything but terminal, her final chapter inscribed upon diagnosis. But when a gorgeous plot twist named Augustus Waters suddenly appears at Cancer ...", "2012-01-10", 11, 313, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(12, "The Hitchhiker\'s Guide to the Galaxy", 12, 5, "Seconds before the Earth is demolished to make way for a galactic freeway, Arthur Dent is plucked off the planet by his friend Ford Prefect, a researcher for the revised edition of The Hitchhiker\'s Guide to the Galaxy who, for the last fifteen y...", "2007-06-23", 12, 193, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(13, "The Giving Tree", 13, 6, "\'Once there was a tree...and she loved a little boy.\'So begins a story of unforgettable perception, beautifully written and illustrated by the gifted and versatile Shel Silverstein.Every day the boy would come to the tree to eat her apples, swin...", "1964-10-07", 13, 64, "9780060256654", "https://covers.openlibrary.org/b/isbn/9780060256654-M.jpg"),
(14, "Wuthering Heights", 14, 3, "You can find the redesigned cover of this edition HERE.This best-selling Norton Critical Edition is based on the 1847 first edition of the novel. For the Fourth Edition, the editor has collated the 1847 text with several modern editions and has ...", "2002-10-28", 14, 464, "9780393978896", "https://covers.openlibrary.org/b/isbn/9780393978896-M.jpg"),
(15, "The Da Vinci Code", 15, 7, "ISBN 9780307277671 moved to this edition.While in Paris, Harvard symbologist Robert Langdon is awakened by a phone call in the dead of the night. The elderly curator of the Louvre has been murdered inside the museum, his body covered in baffling...", "2006-03-28", 15, 489, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(16, "Memoirs of a Geisha", 16, 7, "A literary sensation and runaway bestseller, this brilliant debut novel presents with seamless authenticity and exquisite lyricism the true confessions of one of Japan\'s most celebrated geisha.In Memoirs of a Geisha, we enter a world where appea...", "2005-11-22", 16, 503, "9781400096893", "https://covers.openlibrary.org/b/isbn/9781400096893-M.jpg"),
(17, "The Picture of Dorian Gray", 17, 3, "Written in his distinctively dazzling manner, Oscar Wilde’s story of a fashionable young man who sells his soul for eternal youth and beauty is the author’s most popular work. The tale of Dorian Gray’s moral disintegration caused a scandal when ...", "2004-06-01", 17, 272, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(18, "Alice\'s Adventures in Wonderland & Through the Looking-Glass", 18, 3, "\'I can\'t explain myself, I\'m afraid, sir,\' said Alice, \'Because I\'m not myself, you see.\'When Alice sees a white rabbit take a watch out of its waistcoat pocket she decides to follow it, and a sequence of most unusual events is set in motion. Th...", "2000-12-01", 18, 239, "9780451527745", "https://covers.openlibrary.org/b/isbn/9780451527745-M.jpg"),
(19, "Jane Eyre", 19, 3, "Orphaned as a child, Jane has felt an outcast her whole young life. Her courage is tested once again when she arrives at Thornfield Hall, where she has been hired by the brooding, proud Edward Rochester to care for his ward Adèle. Jane finds her...", "2003-02-04", 19, 532, "9780142437209", "https://covers.openlibrary.org/b/isbn/9780142437209-M.jpg"),
(20, "Les Misérables", 20, 3, "Introducing one of the most famous s in literature, Jean Valjean—the noble peasant imprisoned for stealing a loaf of bread—Les Misérables ranks among the greatest novels of all time. In it, Victor Hugo takes readers deep into the Parisi...", "1987-03-03", 7, 1463, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(21, "Fahrenheit 451", 21, 3, "Guy Montag is a fireman. In his world, where television rules and literature is on the brink of extinction, firemen start fires rather than put them out. His job is to destroy the most illegal of commodities, the printed book, along with the hou...", "2011-11-29", 20, 194, "B0064CPN7I", "https://covers.openlibrary.org/b/isbn/B0064CPN7I-M.jpg"),
(22, "Divergent", 22, 1, "In Beatrice Prior\'s dystopian Chicago world, society is divided into five factions, each dedicated to the cultivation of a particular virtue—Candor (the honest), Abnegation (the selfless), Dauntless (the brave), Amity (the peaceful), and Erudite...", "2012-02-28", 21, 487, "9780062024039", "https://covers.openlibrary.org/b/isbn/9780062024039-M.jpg"),
(23, "Lord of the Flies", 23, 3, "At the dawn of the next world war, a plane crashes on an uncharted island, stranding a group of schoolboys. At first, with no adult supervision, their freedom is something to celebrate; this far from civilization the boys can do anything they wa...", "1999-10-01", 22, 182, "9780140283334", "https://covers.openlibrary.org/b/isbn/9780140283334-M.jpg"),
(24, "Romeo and Juliet", 24, 3, "In Romeo and Juliet, Shakespeare creates a violent world, in which two young people fall in love. It is not simply that their families disapprove; the Montagues and the Capulets are engaged in a blood feud.In this death-filled setting, the movem...", "2004-01-01", 23, 301, "9780743477116", "https://covers.openlibrary.org/b/isbn/9780743477116-M.jpg"),
(25, "The Alchemist", 25, 7, "Paulo Coelho\'s enchanting novel has inspired a devoted following around the world. This story, dazzling in its powerful simplicity and soul-stirring wisdom, is about an Andalusian shepherd boy named Santiago who travels from his homeland in Spai...", "2014-04-15", 24, 182, "9780062315007", "https://covers.openlibrary.org/b/isbn/9780062315007-M.jpg"),
(26, "Crime and Punishment", 26, 3, "Raskolnikov, a destitute and desperate former student, wanders through the slums of St Petersburg and commits a random murder without remorse or regret. He imagines himself to be a great man, a Napoleon: acting for a higher purpose beyond conven...", "2002-12-31", 19, 671, "9780143058144", "https://covers.openlibrary.org/b/isbn/9780143058144-M.jpg"),
(27, "The Perks of Being a Wallflower", 27, 1, "standing on the fringes of life...offers a unique perspective. But there comes a time to seewhat it looks like from the dance floor.This haunting novel about the dilemma of passivity vs. passion marks the stunning debut of a provocative new voic...", "1999-02-28", 25, 213, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(28, "The Great Gatsby", 28, 3, "Alternate Cover Edition ISBN: 0743273567 (ISBN13: 9780743273565)The Great Gatsby, F. Scott Fitzgerald\'s third book, stands as the supreme achievement of his career. This exemplary novel of the Jazz Age has been acclaimed by generations of reader...", "2004-09-28", 26, 200, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(29, "City of Bones", 29, 2, "When fifteen-year-old Clary Fray heads out to the Pandemonium Club in New York City, she hardly expects to witness a murder― much less a murder committed by three teenagers covered with strange tattoos and brandishing bizarre weapons. Then the b...", "2007-03-27", 27, 485, "9781416914280", "https://covers.openlibrary.org/b/isbn/9781416914280-M.jpg"),
(30, "Ender\'s Game", 30, 5, "Andrew \'Ender\' Wiggin thinks he is playing computer simulated war games; he is, in fact, engaged in something far more desperate. The result of genetic experimentation, Ender may be the military genius Earth desperately needs in a war against an...", "2004-09-30", 28, 324, "9780812550702", "https://covers.openlibrary.org/b/isbn/9780812550702-M.jpg"),
(31, "The Help", 31, 7, "Librarian\'s note: An alternate cover edition can be found hereThree ordinary women are about to take one extraordinary step.Twenty-two-year-old Skeeter has just returned home after graduating from Ole Miss. She may have a degree, but it is 1962,...", "2009-02-10", 29, 451, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(32, "Anne of Green Gables", 32, 3, "As soon as Anne Shirley arrives at the snug white farmhouse called Green Gables, she is sure she wants to stay forever . . . but will the Cuthberts send her back to to the orphanage? Anne knows she\'s not what they expected—a skinny girl with fie...", "2003-05-06", 30, 320, "9780451528827", "https://covers.openlibrary.org/b/isbn/9780451528827-M.jpg"),
(33, "Harry Potter and the Sorcerer\'s Stone", 2, 2, "Harry Potter\'s life is miserable. His parents are dead and he\'s stuck with his heartless relatives, who force him to live in a tiny closet under the stairs. But his fortune changes when he receives a letter that tells him the truth about himself...", "2003-11-01", 31, 309, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(34, "The Little Prince", 33, 3, "A PBS Great American Read Top 100 PickFew stories are as widely read and as universally cherished by children and adults alike as The Little Prince. Richard Howard\'s translation of the beloved classic beautifully reflects Saint-Exupéry\'s unique ...", "2000-06-29", 32, 93, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(35, "Charlotte\'s Web", 34, 3, "This beloved book by E. B. White, author of Stuart Little and The Trumpet of the Swan, is a classic of children\'s literature that is \'just about perfect.\' This high-quality paperback features vibrant illustrations colorized by Rosemary Wells!Som...", "2001-10-01", 33, 184, "9780064410939", "https://covers.openlibrary.org/b/isbn/9780064410939-M.jpg"),
(36, "Of Mice and Men", 35, 3, "The compelling story of two outsiders striving to find their place in an unforgiving world. Drifters in search of work, George and his simple-minded friend Lennie have nothing in the world except each other and a dream -- a dream that one day th...", "2002-01-08", 22, 103, "9780142000670", "https://covers.openlibrary.org/b/isbn/9780142000670-M.jpg"),
(37, "The Time Traveler\'s Wife", 36, 7, "A funny, often poignant tale of boy meets girl with a twist: what if one of them couldn\'t stop slipping in and out of time? Highly original and imaginative, this debut novel raises questions about life, love, and the effects of time on relations...", "2013-09-23", 34, 500, "9781939126016", "https://covers.openlibrary.org/b/isbn/9781939126016-M.jpg"),
(38, "Dracula", 37, 3, "You can find an alternative cover edition for this ISBN here and here.A rich selection of background and source materials is provided in three areas: Contexts includes probable inspirations for Dracula in the earlier works of James Malcolm Rymer...", "1986-05-12", 14, 488, "9780393970128", "https://covers.openlibrary.org/b/isbn/9780393970128-M.jpg"),
(39, "Brave New World", 38, 3, "Brave New World is a dystopian novel by English author Aldous Huxley, written in 1931 and published in 1932. Largely set in a futuristic World State, inhabited by genetically modified citizens and an intelligence-based social hierarchy, the nove...", "1998-09-01", 35, 288, "9780060929879", "https://covers.openlibrary.org/b/isbn/9780060929879-M.jpg"),
(40, "One Hundred Years of Solitude", 39, 7, "The brilliant, bestselling, landmark novel that tells the story of the Buendia family, and chronicles the irreconcilable conflict between the desire for solitude and the need for love—in rich, imaginative prose that has come to define an entire ...", "2003-06-24", 36, 417, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(41, "The Catcher in the Rye", 40, 3, "The hero-narrator of The Catcher in the Rye is an ancient child of sixteen, a native New Yorker named Holden Caulfield. Through circumstances that tend to preclude adult, secondhand description, he leaves his prep school in Pennsylvania and goes...", "2001-01-30", 37, 277, "9780316769174", "https://covers.openlibrary.org/b/isbn/9780316769174-M.jpg"),
(42, "The Princess Bride", 41, 2, "What happens when the most beautiful girl in the world marries the handsomest prince of all time and he turns out to be...well...a lot less than the man of her dreams?As a boy, William Goldman claims, he loved to hear his father read the S. Morg...", "2003-07-15", 9, 456, "9780345418265", "https://covers.openlibrary.org/b/isbn/9780345418265-M.jpg"),
(43, "The Lightning Thief", 42, 2, "Alternate cover for this ISBN can be found herePercy Jackson is a good kid, but he can\'t seem to focus on his schoolwork or control his temper. And lately, being away at boarding school is only getting worse - Percy could have sworn his pre-alge...", "2006-03-01", 38, 375, "9780786838653", "https://covers.openlibrary.org/b/isbn/9780786838653-M.jpg"),
(44, "The Secret Garden", 43, 3, "\'One of the most delightful and enduring classics of children\'s literature, The Secret Garden by Victorian author Frances Hodgson Burnett has remained a firm favorite with children the world over ever since it made its first appearance. Initiall...", "1998-09-01", 39, 331, "9780517189603", "https://covers.openlibrary.org/b/isbn/9780517189603-M.jpg"),
(45, "A Thousand Splendid Suns", 44, 7, "A Thousand Splendid Suns is a breathtaking story set against the volatile events of Afghanistan\'s last thirty years—from the Soviet invasion to the reign of the Taliban to post-Taliban rebuilding—that puts the violence, fear, hope, and faith of ...", "2007-06-01", 40, 372, "9781594489501", "https://covers.openlibrary.org/b/isbn/9781594489501-M.jpg"),
(46, "A Wrinkle in Time", 45, 2, "It was a dark and stormy night.Out of this wild night, a strange visitor comes to the Murry house and beckons Meg, her brother Charles Wallace, and their friend Calvin O\'Keefe on a most dangerous and extraordinary adventure—one that will threate...", "2017-11-07", 41, 218, "9781250153272", "https://covers.openlibrary.org/b/isbn/9781250153272-M.jpg"),
(47, "A Game of Thrones", 46, 2, "Here is the first volume in George R. R. Martin’s magnificent cycle of novels that includes A Clash of Kings and A Storm of Swords. As a whole, this series comprises a genuine masterpiece of modern fantasy, bringing together the best the genre h...", "2005-08-28", 42, 835, "9780553588484", "https://covers.openlibrary.org/b/isbn/9780553588484-M.jpg"),
(48, "The Adventures of Huckleberry Finn", 47, 3, "A nineteenth-century boy from a Mississippi River town recounts his adventures as he travels down the river with a runaway slave, encountering a family involved in a feud, two scoundrels pretending to be royalty, and Tom Sawyer\'s aunt who mistak...", "2002-12-31", 43, 327, "9780142437179", "https://covers.openlibrary.org/b/isbn/9780142437179-M.jpg"),
(49, "The Lovely Bones", 48, 7, "\'My name was Salmon, like the fish; first name, Susie. I was fourteen when I was murdered on December 6, 1973.\'So begins the story of Susie Salmon, who is adjusting to her new home in heaven, a place that is not at all what she expected, even as...", "2006-09-01", 5, 372, "9780316166683", "https://covers.openlibrary.org/b/isbn/9780316166683-M.jpg"),
(50, "The Outsiders", 49, 3, "The Outsiders is about two weeks in the life of a 14-year-old boy. The novel tells the story of Ponyboy Curtis and his struggles with right and wrong in a society in which he believes that he is an outsider. According to Ponyboy, there are two k...", "1997-09-01", 44, 192, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(51, "Where the Wild Things Are", 50, 6, "Max, a wild and naughty boy, is sent to bed without his supper by his exhausted mother. In his room, he imagines sailing far away to a land of Wild Things. Instead of eating him, the Wild Things make Max their king.", "2000-10-28", 45, 37, "9780099408390", "https://covers.openlibrary.org/b/isbn/9780099408390-M.jpg"),
(52, "Green Eggs and Ham", 51, 6, "“Do you like green eggs and ham?” asks Sam-I-am in this Beginner Book by Dr. Seuss. In a house or with a mouse? In a boat or with a goat? On a train or in a tree? Sam keeps asking persistently. With unmistakable s and signature rhymes, ...", "1988-10-28", 46, 62, "9780394800165", "https://covers.openlibrary.org/b/isbn/9780394800165-M.jpg"),
(53, "The Odyssey", 52, 3, "Sing to me of the man, Muse, the man of twists and turnsdriven time and again off course, once he had plunderedthe hallowed heights of Troy.So begins Robert Fagles\' magnificent translation of the Odyssey, which Jasper Griffin in The New York Tim...", "2006-11-30", 43, 541, "9780143039952", "https://covers.openlibrary.org/b/isbn/9780143039952-M.jpg"),
(54, "Life of Pi", 53, 7, "Life of Pi is a fantasy adventure novel by Yann Martel published in 2001. The protagonist, Piscine Molitor \'Pi\' Patel, a Tamil boy from Pondicherry, explores issues of spirituality and practicality from an early age. He survives 227 days after a...", "2006-08-29", 47, 460, "9780770430078", "https://covers.openlibrary.org/b/isbn/9780770430078-M.jpg"),
(55, "A Tale of Two Cities", 54, 3, "After eighteen years as a political prisoner in the Bastille, the ageing Doctor Manette is finally released and reunited with his daughter in England. There the lives of two very different men, Charles Darnay, an exiled French aristocrat, and Sy...", "2003-10-28", 22, 489, "9780141439600", "https://covers.openlibrary.org/b/isbn/9780141439600-M.jpg"),
(56, "Water for Elephants", 55, 7, "Winner of the 2007 BookBrowse Award for Most Popular Book.An atmospheric, gritty, and compelling novel of star-crossed lovers, set in the circus world circa 1932, by the bestselling author of Riding Lessons. When Jacob Jankowski, recently orphan...", "2007-05-01", 48, 335, "9781565125605", "https://covers.openlibrary.org/b/isbn/9781565125605-M.jpg"),
(57, "Lolita", 56, 3, "Humbert Humbert - scholar, aesthete and romantic - has fallen completely and utterly in love with Lolita Haze, his landlady\'s gum-snapping, silky skinned twelve-year-old daughter. Reluctantly agreeing to marry Mrs Haze just to be close to Lolita...", "1995-10-28", 19, 331, "B00IIAQY3Q", "https://covers.openlibrary.org/b/isbn/B00IIAQY3Q-M.jpg"),
(58, "Slaughterhouse-Five", 57, 3, "Selected by the Modern Library as one of the 100 best novels of all time, Slaughterhouse-Five, an American classic, is one of the world\'s great antiwar books. Centering on the infamous firebombing of Dresden, Billy Pilgrim\'s odyssey through time...", "1999-01-12", 49, 275, "9780385333849", "https://covers.openlibrary.org/b/isbn/9780385333849-M.jpg"),
(59, "Frankenstein: The 1818 Text", 58, 3, "Mary Shelley\'s seminal novel of the scientist whose creation becomes a monsterThis edition is the original 1818 text, which preserves the hard-hitting and politically charged aspects of Shelley\'s original writing, as well as her unflinching wit ...", "2018-03-08", 43, 288, "9780143131847", "https://covers.openlibrary.org/b/isbn/9780143131847-M.jpg"),
(60, "The Kite Runner", 44, 7, "The unforgettable, heartbreaking story of the unlikely friendship between a wealthy boy and the son of his father’s servant, The Kite Runner is a beautifully crafted novel set in a country that is in the process of being destroyed. It is about t...", "2004-05-28", 40, 371, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(61, "The Handmaid\'s Tale", 59, 7, "Offred is a Handmaid in the Republic of Gilead. She may leave the home of the Commander and his wife once a day to walk to food markets whose signs are now pictures instead of words because women are no longer allowed to read. She must lie on he...", "1998-04-28", 50, 314, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(62, "The Giver", 60, 1, "Twelve-year-old Jonas lives in a seemingly ideal world. Not until he is given his life assignment as the Receiver does he begin to understand the dark secrets behind this fragile community.", "2006-01-24", 51, 208, "9780385732550", "https://covers.openlibrary.org/b/isbn/9780385732550-M.jpg"),
(63, "Catch-22", 61, 3, "The novel is set during World War II, from 1942 to 1944. It mainly follows the life of Captain John Yossarian, a U.S. Army Air Forces B-25 bombardier. Most of the events in the book occur while the fictional 256th Squadron is based on the island...", "2004-09-04", 20, 453, "9780684833392", "https://covers.openlibrary.org/b/isbn/9780684833392-M.jpg"),
(64, "Dune", 62, 5, "Set on the desert planet Arrakis, Dune is the story of the boy Paul Atreides, heir to a noble family tasked with ruling an inhospitable world where the only thing of value is the “spice” melange, a drug capable of extending life and enhancing co...", "2019-10-01", 52, 661, "9780593099322", "https://covers.openlibrary.org/b/isbn/9780593099322-M.jpg"),
(65, "The Pillars of the Earth", 63, 4, "Ken Follett is known worldwide as the master of split-second suspense, but his most beloved and bestselling book tells the magnificent tale of a twelfth-century monk driven to do the seemingly impossible: build the greatest Gothic cathedral the ...", "2002-02-04", 53, 976, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(66, "The Stand", 64, 8, "This is the way the world ends: with a nanosecond of computer error in a Defense Department laboratory and a million casual contacts that form the links in a chain letter of death. And here is the bleak new world of the day after: a world stripp...", "1990-05-01", 54, 1153, "9780385199575", "https://covers.openlibrary.org/b/isbn/9780385199575-M.jpg"),
(67, "The Adventures of Sherlock Holmes", 65, 3, "The Adventures of Sherlock Holmes is the series of short stories that made the fortunes of the Strand magazine, in which they were first published, and won immense popularity for Sherlock Holmes and Dr Watson. The detective is at the height of h...", "1998-10-22", 55, 389, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(68, "Watership Down", 66, 3, "Librarian\'s note: See alternate cover edition of ISBN13 9780380395866 here.Set in England\'s Downs, a once idyllic rural landscape, this stirring tale of adventure, courage and survival follows a band of very special creatures on their flight fro...", "1975-06-28", 56, 478, "9780380395866", "https://covers.openlibrary.org/b/isbn/9780380395866-M.jpg"),
(69, "Great Expectations", 54, 3, "\'In what may be Dickens\'s best novel, humble, orphaned Pip is apprenticed to the dirty work of the forge but dares to dream of becoming a gentleman — and one day, under sudden and enigmatic circumstances, he finds himself in possession of \'great...", "1998-10-28", 55, 505, "9780192833594", "https://covers.openlibrary.org/b/isbn/9780192833594-M.jpg"),
(70, "Little Women", 67, 3, "Generations of readers young and old, male and female, have fallen in love with the March sisters of Louisa May Alcott’s most popular and enduring novel, Little Women. Here are talented tomboy and author-to-be Jo, tragically frail Beth, beautifu...", "2004-04-06", 7, 449, "9780451529305", "https://covers.openlibrary.org/b/isbn/9780451529305-M.jpg"),
(71, "The Bell Jar", 68, 3, "The Bell Jar chronicles the crack-up of Esther Greenwood: brilliant, beautiful, enormously talented, and successful, but slowly going under—maybe for the last time. Sylvia Plath masterfully draws the reader into Esther\'s breakdown with such inte...", "2006-10-28", 3, 294, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(72, "Harry Potter and the Deathly Hallows", 2, 2, "Harry Potter is leaving Privet Drive for the last time. But as he climbs into the sidecar of Hagrid’s motorbike and they take to the skies, he knows Lord Voldemort and the Death Eaters will not be far behind.The protective charm that has kept hi...", "2007-07-21", 57, 759, "9780545010221", "https://covers.openlibrary.org/b/isbn/9780545010221-M.jpg"),
(73, "One Flew Over the Cuckoo\'s Nest", 69, 3, "Tyrannical Nurse Ratched rules her ward in an Oregon State mental hospital with a strict and unbending routine, unopposed by her patients, who remain cowed by mind-numbing medication and the threat of electric shock therapy. But her regime is di...", "1963-02-01", 58, 325, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(74, "Anna Karenina", 70, 3, "Acclaimed by many as the world\'s greatest novel, Anna Karenina provides a vast panorama of contemporary life in Russia and of humanity in general. In it Tolstoy uses his intense imaginative insight to create some of the most memorable s...", "2012-10-16", 59, 964, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg"),
(75, "Outlander", 71, 4, "The year is 1945. Claire Randall, a former combat nurse, is just back from the war and reunited with her husband on a second honeymoon when she walks through a standing stone in one of the ancient circles that dot the British Isles. Suddenly she...", "2005-07-26", 60, 850, "9780440242949", "https://covers.openlibrary.org/b/isbn/9780440242949-M.jpg"),
(76, "My Sister\'s Keeper", 72, 7, "Anna is not sick, but she might as well be. By age thirteen, she has undergone countless surgeries, transfusions, and shots so that her older sister, Kate, can somehow fight the leukemia that has plagued her since childhood. The product of preim...", "2005-02-01", 61, 423, "9780743454537", "https://covers.openlibrary.org/b/isbn/9780743454537-M.jpg"),
(77, "Matilda", 73, 6, "Matilda is a little girl who is far too good to be true. At age five-and-a-half she\'s knocking off double-digit multiplication problems and blitz-reading Dickens. Even more remarkably, her classmates love her even though she\'s a super-nerd and t...", "1998-06-01", 62, 240, "9780141301068", "https://covers.openlibrary.org/b/isbn/9780141301068-M.jpg"),
(78, "The Fellowship of the Ring", 9, 3, "One Ring to rule them all, One Ring to find them, One Ring to bring them all and in the darkeness bind themIn ancient times the Rings of Power were crafted by the Elven-smiths, and Sauron, The Dark Lord, forged the One Ring, filling it with his ...", "1973-03-28", 9, 527, "9780345015339", "https://covers.openlibrary.org/b/isbn/9780345015339-M.jpg"),
(79, "The Girl with the Dragon Tattoo", 74, 7, "Harriet Vanger, a scion of one of Sweden’s wealthiest families disappeared over forty years ago. All these years later, her aged uncle continues to seek the truth. He hires Mikael Blomkvist, a crusading journalist recently trapped by a libel con...", "2008-09-16", 63, 465, "9999999999999", "https://covers.openlibrary.org/b/isbn/9999999999999-M.jpg");



DROP TABLE IF EXISTS `borrowings`;
CREATE TABLE IF NOT EXISTS `borrowings` (
  `id_borrowing` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_book` int NOT NULL,
  `id_user` int DEFAULT '0',
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_borrowing`),
  KEY `id_book` (`id_book`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=82 ;



INSERT INTO `borrowings` (`id_borrowing`, `id_book`, `id_user`, `availability`) VALUES
(1, 1, 0, 1),
(2, 2, 0, 1),
(3, 3, 0, 1),
(4, 4, 0, 1),
(5, 5, 0, 1),
(6, 6, 0, 1),
(7, 7, 0, 1),
(8, 8, 0, 1),
(9, 9, 0, 1),
(10, 10, 0, 1),
(11, 11, 0, 1),
(12, 12, 0, 1),
(13, 13, 0, 1),
(14, 14, 0, 1),
(15, 15, 0, 1),
(16, 16, 0, 1),
(17, 17, 0, 1),
(18, 18, 0, 1),
(19, 19, 0, 1),
(20, 20, 0, 1),
(21, 21, 0, 1),
(22, 22, 0, 1),
(23, 23, 0, 1),
(24, 24, 0, 1),
(25, 25, 0, 1),
(26, 26, 0, 1),
(27, 27, 0, 1),
(28, 28, 0, 1),
(29, 29, 0, 1),
(30, 30, 0, 1),
(31, 31, 0, 1),
(32, 32, 0, 1),
(33, 33, 0, 1),
(34, 34, 0, 1),
(35, 35, 0, 1),
(36, 36, 0, 1),
(37, 37, 0, 1),
(38, 38, 0, 1),
(39, 39, 0, 1),
(40, 40, 0, 1),
(41, 41, 0, 1),
(42, 42, 0, 1),
(43, 43, 0, 1),
(44, 44, 0, 1),
(45, 45, 0, 1),
(46, 46, 0, 1),
(47, 47, 0, 1),
(48, 48, 0, 1),
(49, 49, 0, 1),
(50, 50, 0, 1),
(51, 51, 0, 1),
(52, 52, 0, 1),
(53, 53, 0, 1),
(54, 54, 0, 1),
(55, 55, 0, 1),
(56, 56, 0, 1),
(57, 57, 0, 1),
(58, 58, 0, 1),
(59, 59, 0, 1),
(60, 60, 0, 1),
(61, 61, 0, 1),
(62, 62, 0, 1),
(63, 63, 0, 1),
(64, 64, 0, 1),
(65, 65, 0, 1),
(66, 66, 0, 1),
(67, 67, 0, 1),
(68, 68, 0, 1),
(69, 69, 0, 1),
(70, 70, 0, 1),
(71, 71, 0, 1),
(72, 72, 0, 1),
(73, 73, 0, 1),
(74, 74, 0, 1),
(75, 75, 0, 1),
(76, 76, 0, 1),
(77, 77, 0, 1),
(78, 78, 0, 1),
(79, 79, 0, 1);
COMMIT;


DROP TABLE IF EXISTS `editors`;
CREATE TABLE IF NOT EXISTS `editors` (
  `id_editor` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255)   NOT NULL,
  PRIMARY KEY (`id_editor`)
) ENGINE=InnoDB AUTO_INCREMENT=64 ;


INSERT INTO `editors` (`id_editor`, `name`) VALUES
(1, "Scholastic Press"),
(2, "Scholastic Inc."),
(3, "Harper Perennial Modern Classics"),
(4, "Modern Library"),
(5, "Little, Brown and Company"),
(6, "Alfred A. Knopf"),
(7, "Signet Classics"),
(8, "HarperCollins"),
(9, "Ballantine Books"),
(10, "Warner Books"),
(11, "Dutton Books"),
(12, "Del Rey"),
(13, "HarperCollins Publishers"),
(14, "Norton"),
(15, "Anchor"),
(16, "Vintage Books USA"),
(17, "Random House: Modern Library"),
(18, "Penguin Group (USA)"),
(19, "Penguin"),
(20, "Simon & Schuster"),
(21, "Katherine Tegen Books"),
(22, "Penguin Books"),
(23, "Simon Schuster"),
(24, "HarperOne"),
(25, "MTV Books/Pocket Books"),
(26, "Scribner"),
(27, "Margaret K. McElderry Books"),
(28, "Macmillan Audio"),
(29, "Amy Einhorn Books/G.P. Putnam\'s Sons"),
(30, "Signet Book"),
(31, "Scholastic Inc"),
(32, "Harcourt, Inc."),
(33, "HarperCollinsPublishers"),
(34, "Zola Books"),
(35, "HarperPerennial / Perennial Classics"),
(36, "Harper"),
(37, "Back Bay Books"),
(38, "Disney Hyperion Books"),
(39, "Children\'s Classics"),
(40, "Riverhead Books"),
(41, "Square Fish"),
(42, "Bantam"),
(43, "Penguin Classics"),
(44, "Puffin Books (US/CAN)"),
(45, "Red Fox"),
(46, "Random House Books for Young Readers"),
(47, "Seal Books"),
(48, "Algonquin Books"),
(49, "Dial Press"),
(50, "Anchor Books"),
(51, "Ember"),
(52, "Ace Books"),
(53, "NAL Trade"),
(54, "Doubleday Books"),
(55, "Oxford University Press"),
(56, "Avon Books"),
(57, "Arthur A. Levine Books / Scholastic Inc."),
(58, "Signet"),
(59, "Vintage"),
(60, "Dell Publishing Company"),
(61, "Washington Square Press"),
(62, "Puffin Books"),
(63, "Knopf");



DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `id_genre` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255)   NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 ;



INSERT INTO `genres` (`id_genre`, `name`) VALUES
(1, "Young Adult"),
(2, "Fantasy"),
(3, "Classics"),
(4, "Historical Fiction"),
(5, "Science Fiction"),
(6, "Childrens"),
(7, "Fiction"),
(8, "Horror");



DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255)   NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=6 ;


INSERT INTO `roles` (`id_role`, `name`) VALUES
(1, "administrateur"),
(2, "utilisateur");


DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255)   NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(255)   NOT NULL,
  `address` varchar(255)   DEFAULT NULL,
  `zip_code` varchar(255)   NOT NULL,
  `city` varchar(255)   NOT NULL,
  `country` varchar(255)   NOT NULL,
  `password` varchar(10)  NOT NULL,
  `id_role` int NOT NULL DEFAULT "1",
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=3 ;



INSERT INTO `users` (`id_user`, `last_name`, `first_name`, `birthdate`, `email`, `address`, `zip_code`, `city`, `country`, `password`, `id_role`) VALUES
(1, "Constable", "Yolène", "1998-06-13", "yoleneconstable@live.fr", "204 rue des Chênes Bruns", "95000", "Cergy", "France", "123456", 1),
(2, "Dujardin", "Jean", "1997-12-01", "j.dujardin@hotmail.fr", "60 rue de Migneaux", "78300", "Poissy", "France", "test123", 2);
COMMIT;

