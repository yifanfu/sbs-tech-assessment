#PHP Code Questions

##Instructions to run the code for php part
1. Bring the docker container up `docker-compose up -d`
2. Run the code `docker-compose exec php php src/index.php`
3. Run the unit tests for Question 1.8 `docker-compose exec php ./vendor/bin/phpunit`
4. I would definitely have more unit tests if I have more then :)

##Question #1.1
Write a fluent interface that will get and set the following data:
• Name
• Phone Number
• Email

> __Answer:__ Please see check code at `src/PhpQuestions/Person.php`

##Question #1.2
Create a function that will generate a random hand of 5 standard playing cards from a single deck of cards.
The hand of cards must be returned in the format: array('2c', '6d', 'as', 'jh', '10c');

> __Answer:__ Please see check code at `src/PhpQuestions/PlayingCard.php`

##Question #1.3

Create a function that will return a boolean result as to whether the hand of cards returned by the function from question 1.1 contains a 'straight' or 'straight flush'.
For this test we are looking for as few code characters as possible (Code elegance is not required). 
Note: This is testing your creativity for coming up with a solution - it is not expected to be easily readable or best-practice.
It has been done with as few as 61 characters, but more commonly between 100-225 chars - the lower the better.

Notes
Aces are high AND low.
The #10 cards are 3 characters (10h, 10c, 10s, 10d)
Reference
Straight : http://en.wikipedia.org/wiki/List_of_poker_hands#Straight
Straight Flush : http://en.wikipedia.org/wiki/List_of_poker_hands#Straight_flush

> __Answer:__ Please see check code at `src/PhpQuestions/CardChecker.php`

##Question #1.4
The word 'Lorem' is ciphered to the number 121518513.
Provide a function that is able to convert any defined word using the same cipher pattern.
Test the function using the word 'Ipsum' and provide the returned number.

> __Answer:__ Please see check code at `src/PhpQuestions/Cipher.php`

##Question #1.5

The given array represents the height of a series of 1x1 blocks that are stacked on top of each other.
Water is then poured over the blocks and collects into pools between the gaps.

The following image (https://i.imgur.com/riclxSE.png) is a visual example of the blocks (black) and the pooled water (blue) for the example array values defined below.

Input: [0,1,0,2,1,0,1,3,1,3,2,1,0]
Output: 7 (volume of water)

Write a function that given an array formatted similarly as above, but with different values, will calculate the total volume of water measured as 1x1 units. The array will only ever include positive integer values.

> __Answer:__ Please see check code `src/PhpQuestions/WaterVolume.php`

##Question #1.6

This question requires close attention to detail - beware!

The following code has many errors, problems and examples of bad usage of code.
Using only PHP functions or classes and methods (No vendor frameworks), rewrite the code so it is secure, efficient/optimised and returns no errors.

The purpose of the code is to connect to the database, and output data only from the column 'example_column' for however many rows that are returned.
The database query needs to be filtered to equal a querystring parameter called 'parameter' and to not equal the defined $example_integer.

// Connect to the database.
mysql_connect("localhost", 'admin', "password") or die(mysql_error());
mysql_select_db("my_database") or die(mysql_error());
// Set an INTEGER variable to be used within the database query.
$example_integer = "123"
// Retrieve ONLY the column 'example_column' from 'example_table'.
$result = mysql_query('SELECT * FROM example_table WHERE "example_column" == $_REQUEST['parameter'] && "example_column" NOT IN ("$example_integer")') or die(mysql_error());
// Loop through the returned record(s) from the database query and output all data for each row.
for ($i=0;($row=mysql_fetch_array($result));$i+1){ 
  print_r('<pre>'.$row);
} 

> __Answer:__ Please see check code at `src/PhpQuestions/ExampleColumn.php`

##Question #1.7
Using an array of numeric values representing the history of stock prices on a day-to-day basis, create a class that returns what would have been the best days to buy and then sell the stock at a profit.
• Only a single stock can be held at one time.
• No stock is held at the start - e.g. the first action should be to buy stock.
• Buy and sell as many times as required to maximise profits.

The returned output needs to state the following data:
• All transactions listing the numeric days and prices that stock was bought and sold.
• The profit of each completed transaction.
• The total profit of all transactions.
• Note: All stocks must be sold by the end of the stock price history.

As an example, using the following stock value history: 300, 250, 260, 310, 215, 280.
Buy on day 2 @ 250, sell on day 4 @ 310, buy again on day 5 @ 215 and sell on day 6 @ 280.
This would have returned a profit of 60 + 65 = 125. 

The returned data should be within an array structured as follows:
array(
  'transactions' => array(
    '0' => array(
      'bought' => array(
        'day' => [numeric value],
        'value' => [numeric value]
      ),
      'sold' => array(
        'day' => [numeric value],
        'value' => [numeric value]
        ),
      'profit' => [numeric value],
    ),
    ...[repeat as necessary]...
  ),
  'total_profit' => [numeric value]
);

The class should be able to handle any array of numeric values supplied, however, use the following values for your answer.

[360, 255, 260, 230, 150, 100, 135, 265, 750, 460, 600]

> __Answer:__ Please see check code at `src/PhpQuestions/MaxProfit.php`

##Question #1.8
An online shop can accept orders 24hrs a day, 365 days a year.
However, the shop needs to post the orders to customers and can only do so on business days before 4pm.
Any orders received after 4pm need to be dispatched the next business day.
The deliveries then take 3 business days (including the dispatch date) to be delivered to the customer.

Example
• #1: Ordered BEFORE 4pm on Monday 2000-01-03 (15:59:59) | Delivery: Wednesday 2000-01-05
• #2: Ordered AFTER 4pm Monday 2000-01-03 (16:00:00) | Delivery: Thursday 2000-01-06

A business day is considered Monday to Friday and does not include the following dates:
• New Year's Day : 1st January
• Australia Day : 26th January
• Good Friday (Easter) : Variable date
• Easter Monday : Variable date
• Anzac Day : 25th April
• Queen's Birthday : Second Monday in June
• Labour Day : First Monday in October
• Christmas Day : 25th December
• Boxing Day : 26th December

Important notes:
• All dates are for NSW public holidays.
• All times are for Sydney Australia.
• The solution must work for all years since the year 2000 onwards (not just this year).
• Orders will not be dispatched on non-business days.
• Dispatched orders will be delayed during transit over non-business days - e.g. an order dispatched on Friday will not arrive until Tuesday (3 day transit).
• If one of the listed holidays falls on a Saturday or Sunday, it must be rolled over to the next Monday - with the exception of Anzac Day (which doesn't).

Create a class that when given a specific date and time formatted YEAR-MONTH-DAY HOUR:MINUTE:SECOND (Y-m-d H:i:s), will return via two separate methods the dispatch date and the delivery date of the order formatted as YEAR-MONTH-DAY. Include unit tests for each date.

> __Answer:__ Please see check code at `src/PhpQuestions/Shipping.php`
>
>By the way the test case provided is wrong, 2000-01-03 is public holiday. (2000-01-01 is Saturday and 2000-01-02 is Sunday)

#Database Questions
Note: All of the following questions are with reference to using MySQL.

##Question #2.1 
The following two tables contain data that is related to each other via the 'id' of 'table_1' and 'foreign_key' of 'table_2'.
Write an SQL query that will output all columns from 'table_1' and 'column_z' of 'table_2' merged together into a single query.

The schema of both tables is as follows:

CREATE TABLE `table_1` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `column_x` varchar(255) DEFAULT NULL,
    `column_y` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `table_2` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `foreign_key` int(11) DEFAULT NULL,
    `column_z` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `foreign_key` (`foreign_key`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

> __Answer:__ 
>
>``` sql
>SELECT table_1.column_x, 
>       table_1.column_y, 
>       table_2.column_z 
>FROM   table_1 
>       JOIN table_2 
>         ON table_1.id = table_2.foreign_key 
>```

##Question #2.2
A database table named table_1 has three columns named column_a to column_c that each contain an integer data type. Of the three columns, column_a and column_b are used together to uniquely indentify a row.

Write an SQL statement to create a table that matches the defined schema.

> __Answer:__
>
>```sql
>CREATE TABLE `table_1`(
>    `column_a` INT NULL,
>    `column_b` INT NULL,
>    `column_c` INT NULL,
>    UNIQUE `unique_column`(`column_a`, `column_b`) USING BTREE
>) ENGINE = InnoDB;
>```

##Question #2.3
A table contains a set of unique rows of data that includes a composite index on the 'column_1' and 'column_2' columns.
You have a script that needs to update existing rows within the table, if the row does not exist, then a new row needs to be inserted into the table.
Using the basic table schema below, how would you write a single SQL query to handle both the INSERT and UPDATE events?

CREATE TABLE `table_1` (
    `column_1` varchar(255) DEFAULT NULL,
    `column_2` varchar(255) DEFAULT NULL,
    `column_3` varchar(255) DEFAULT NULL,
    UNIQUE KEY `column_1_column_2` (`column_1`, `column_2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

> __Answer:__
>
>```sql
>INSERT INTO table_1(column_1, column_2, column_3)
>VALUES('1', '1', '1')
>ON DUPLICATE KEY
>UPDATE
>    column_3 =
>VALUES(column_3) + 1;
>```

##Question #2.4

The two following SQL statements need to be run sequentially to each other.

UPDATE table_1 SET column_x = 'value_1' WHERE column_id = 123;
INSERT INTO table_1 (column_x, column_y, column_z) VALUES ('123', 'abc', 'xyz');

However, it is critical that if either of the SQL statements fail, that neither of the statements are committed to the database.

How could the integrity of this data be ensured?

> __Answer:__
>
>In this case you can use MySQL TRANSACTION, you send the query `START TRANSACTION`, and in the php(or any other language) you can check if the first query been executed successfully. If not you can send `ROLLBACK` to roll the previous query.

##Question #2.5

A table named 'table_1' needs to automatically add the date formatted as YYYY-MM-DD HH:MM:SS to a column named 'created_date' when a new row is inserted to the table.

Write an SQL statement to add this functionality to the table.

> __Answer:__
>
>```sql
>ALTER TABLE table_1 ADD COLUMN created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
>```

##Question #2.6
A table has over 1 million rows with multiple columns containing long text strings.
A simple query on the page is used for pagination to display pages of the results.
When querying low page numbers, it runs within 0.01 seconds per query, however, when viewing high page counts the query time extends dramatically to over 0.5 seconds.
Both example queries are included below.

SELECT table_1.*
FROM table_1
WHERE table_1.column = "zyx"
ORDER BY table_1.date DESC
LIMIT 0, 20;
Time: 0.01s

SELECT table_1.*
FROM table_1
WHERE table_1.column = "zyx"
ORDER BY table_1.date DESC
LIMIT 10000, 20;
Time: 0.5s

What is the issue with this query? 
Using only SQL and the existing defined parameters, how would you rewrite the query to enhance the performance?

> __Answer:__
>
>The issue is that it's always search from beginning of the table, and it's easy to optimize. In this case, we can pass in the the smallest date from last search fetch result and it can skip searching previous result. Example query as below:
>
>```sql
>SELECT table_1.*
>FROM table_1
>WHERE table_1.column = "zyx"
>AND table_1.date < <previous_smallest_date>
>ORDER BY table_1.date DESC
>LIMIT 10000, 20;
>```
>This is pseudo code and need to replace `<previous_smallest_date>` with real value.

#Git Questions

##Question 3.1
You are using a third-party company to host your private Git repository.
The repository contains the code base to the entire project, including all access details required to access the database.
What steps could you take to improve the security on such sensitive data? 

> __Answer:__
>
>Put access details in the git repo is very dangerous, we should NEVER EVER try to do it. For solving the problem, following actions is what we can do.
>   1. Using environment variables instead of hardcoded access details
>   2. Put access details in to some secure place and only fetch when the project go through CI/CD pipeline.
>   3. Never use "easy to guess password", should always generate random characters.
>   3. Rotate the access details in a certain period of time to make sure they are safe.
>   4. I highly recommend to use AWS Secrets Manager

##Question 3.2
You are assigned the task of setting up a new workflow for your team to commit code to a projects Git repository.

The challenges that the workflow must be able to support are as follows:
- There are multiple team members based in different locations that need to be able to use the workflow without needing to communicate and co-ordinate with other team members.
- Some developers will be working on the same feature as each other, whilst others will be working on separate features from anyone else, but each feature needs to be commited to the same repository.
- Team members will need to be able to test their code commits merged with other developer commits on QA and Staging environments.
- The team need a method of commiting hotfixes to the repository that can be tested and then deployed.
- There must be easily identifiable production ready commits within the repository which can be deployed at any time.

How would you design a workflow to suit these requirements?

> __Answer:__
>
>1. We can actually just use standard git flow with some modification for this
>2. It has `feature` branches to let developer to create branch to related to the feature they are building
>3. Each `feature` has an epic branch, and each epic branch will have sub branches.
>4. When developer finish their part of work, they should commit and push their part to the epic branch
>5. Building system should allow user to build based on the branch number (e.g. `feature/epic1`) for QA and Staging environment so it can be tested properly.
>6. After that feature passed QA, we can merge it to the `develop` branch and we can use it for regression test。
>7. Once the regression test passed we can create a `release` branch with the version number based on the `develop` branch, and then we merge it to master and give master a version tag so we know it's stable and if we need to rollback somehow we can rollback to this tagged commit.
>8. apart from all of that we will also have `hotfix` branches so for every issue we found we create a branch. After `hotfix` branch tested we also merge it into master and give it a fix tag.
>9. To sum up we will have `feature`, `develop`, `release`, `master`, and `hotfix`

#Security Questions

##Question #4.1
The following code snippet is in PHP. What is the security concern with it?

include($_GET['file']);

> __Answer:__
>
>this will include whatever file user passed in, so for example, user can upload a file using website and include it using this method. In this case user can do whatever they want.

##Question #4.2
A user clicks the following link:
http://www.sitea.com/?search=%22%3E%3C/style%3E%3Cscript%3Ea=eval;b=alert;a%28b%28/%20Hey!/.source%29%29;%3C/script%3E%27%22%3E

When the page reloads, a JavaScript alert displays the message 'Hey!'.

• What has occurred in this situation?
• What are the potential dangers?
• How can it be prevented?

> __Answer:__
>
>1. XSS attack (non-persistent). Website didn't escape the GET parameters and just append whatever user typed to page, in this case user close the style tag and start with new script tag.
>2. This is very dangerous, just using the example from question 4.4 user can use javascript to emulator user operation and transfer you money to other account. It can also load contents from other source and let you think it's content from current website
>3. Don's trust any user, always escape/process data from user before use.

##Question #4.3
The following query is requested via PHP.

$query = mysql_query('
    SELECT t1.id, t1.name, t2.category
    FROM table_1 t1
        JOIN table_2 t2 ON t1.id = t2.foreign_key
    WHERE 
        t1.date > DATE_SUB(NOW(), INTERVAL 1 MONTH) AND
        t2.category = "'.$_GET['parameter'].'"
    ORDER BY t.date DESC
');

What is the problem with this?
How can the problem be prevented?

> __Answer:__
>
>1. Again this is an example that not escape user data, it will allow user to have direct access to your database. e.g. they can input `1 or 1=1` which will display all the rows, additionally they can use `;` to close the query early and write their own script. Basically user have all access that the db user you use in your application to your database.
>2. We can escape the value by `mysqli_real_escape_string()` or `PDO` prepare statement.

##Question #4.4
User X has just successfully logged into Site A - their bank.
User X then leaves Site A and visits Site B which is a message board/forum that allows other users to post html code.
User Y on Site B posts an image with the following html: <img src="http://www.sitea.com/?action=transfer-funds&amount=1000" style="visibility:hidden;"/>
User X then views the page containing User Y's posted html.
Without User X knowing, by viewing User Y's code, their Bank at Site A has just transferred money from their account to User Y.

• What has occurred here?
• Which parties are responsible?
• How can the problem be prevented?

> __Answer:__
>
>1. XSS attack (persistent).
>2. Site B(tech responsibility)/User Y(legal responsibility)
>3. Site B shouldn't trust user's input, should pre-process it before post it. Things like encode user input with [percent-encoding](https://en.wikipedia.org/wiki/Percent-encoding)

#Theory Questions

##Question #5.1
You've just inherited a PHP application that is running slowly. 
What kind of techniques would you use to determine the cause of the problem, and what kind of solutions do you think would help improve the situation?

> __Answer:__
>
>It will include few steps:
>
>1. Check local Internet connection and make sure the issue is not in client's side
>2. Check DNS query response time
>3. Check load balancer response time
>4. Check container/host machine load (CPU/RAM)
>5. Check error logs in whatever tools it use (could be raw files, newrelic, cloudwatch, elk stack, sumo logic, etc)
>6. Check database load
>7. Check slow queries if it's enabled
>8. Solutions can be vary depends on what issue is it. we can add more tasks/pod/host machine, fix php errors, optimize slow queries, etc.

##Question #5.2
You are put in charge of planning the caching strategy of a high traffic site.
• How would you setup the caching strategy for the site?
• What kind of technologies and/or third-party services would you use?
• What kind of challenges need to be considered?

Points to consider:
1. Content on the site will be regularly updated via a CMS using a MySQL database; whilst other content would remain unchanged for long periods of time.
2. Elements of each page within the site can contain dynamic content that is customised to a logged in user - e.g. it may display their username and comment notifications.
3. Content within each page may contain many image assets.
4. Content on the site is built from data sourced via a third-party API request - e.g. a count displaying the number of times a page has been shared via social media.

> __Answer:__
>
>1. All the assets I would put in the s3 and use cloudfront to cache them.
>2. Dynamic content for each user I would cache them in the redis with reasonable TLL set.
>3. For contents unchanged in long period of time I would also use cdn to serve them
>4. For contents update regularly I would use write through strategy and implement by event driven architect. Every time editor publish a new article will trigger an event and the producer will put event into stream. One consumer will pick up that event and cache it into redis. As same as new article, amend an article will also trigger event and the cache in the redis will be update.
>5. For third party request that doesn't need to be real time I would Implement a worker to call API in a certain period of time and put it into redis.
>6. technologies/services I would use is:
>   1. AWS S3 (for storing asserts)
>   2. AWS CloudFront (for serving asserts)
>   3. AWS ElastiCache (for using redis)
>   4. AWS DynamoDB (for storing/trigger event)
>   5. AWS Lambda (for consumer/producer/worker)
>   6. AWS CloudWatch (for triggering lambda functions)

##Question #5.3
You are managing a site with over 100,000 articles.
Approximately 300 new articles are added to the site every day.

The sitemap for the site is setup with the following structure:
articles_1.xml
articles_2.xml
articles_3.xml
... etc

Each of these files list 1,000 articles listed in chronological order using the Sitemap XML schema (http://www.sitemaps.org/protocol.html).
The file articles_1.xml always contains the 1,000 most recently published articles, then articles_2.xml contains 1,001-2,000 etc most recent articles.
As the article ages, the <lastmod> and <changefreq> nodes within the XML will need to be updated.

What issue can you see this causing?
Considering that you can change the structuring and naming of the files, how would you propose that the solution could be fixed?
Note: The solution must allow for the <lastmod> and <changefreq> nodes to be updated when required.

> __Answer:__
>
>The issue I can see is every time we generate sitemap file it will require to update all the xml file and it could be a potential issue. 
>
>I would like to create two MySQL tables, one for relationships like which article is in which file, it will help us to update the `<lastmod>` and `<changefreq>` easily. 
>
>The second table will be a temporary table table storing new articles, and we may have a worker to constantly checking that table, once it reach 1,000, it will:
>   1. create a new xml file with all the new articles in it.
>   2. rename the new xml to articles_1.xml and rename articles_1.xml to articles_2.xml, etc
>   3. update the relationship table to make sure the relationship is correctly set.
>
>With this solution we can still easily update the properties of article since we have correct relationship in the relationship table.
>
>(I could be really wrong as I'm not that good at SEO)

##Question #5.4

A media news team is responsible for creating news articles that are available in digital formats.
When the team started out, they only needed to publish content for their website. However, as the digital media industry has matured, the publishing platform has diversified to now facilitate articles being published to other third-party platforms to reach wider audiences. 

When their custom CMS was first developed, they had a single class and set of methods that would build articles based on the requirements of the frontend for the own website. As other third-party platforms have been introduced, each of those platforms have their own idiosyncrasies as to how they require content to be handled. However, each of them still have the same core requirements as such as article titles, descriptions, primary images etc.

The single class that is used to handle this functionality has become more and more bloated as each new publishing platform is introduced.
A simplified example of the class is included further below.

What design pattern could be introduced to better architect this design and what benefits would it bring?
No code is required, but can be included if you wish to use it in your explanation.

class Article {
	public function createArticle($articleContent) {
		if ($articleContent['type'] == 'syndication') {
			$article = new syndication();
		} else if ($articleContent['type'] == 'apple') {
			$article = new appleNews();
		} else if ($articleContent['type'] == 'facebook') {
			$article = new facebookInstantArticle();
		} else {
			$article = new website();
		}

		$article->title($articleContent['title']);
		$article->description($articleContent['description']);
		$article->articleBody($articleContent['body']);

		return $article;
	}

	private function website() { ... };
	private function syndication() { ... };
	private function appleNews() { ... };
	private function facebookInstantArticle() { ... };
}

> __Answer:__
>
>I would probably choose to use Strategy Pattern for this case, reason behind it is all of them sharing very similar information however they surely will have different way to communicate with their platform (e.g. api, sdk, etc). With Strategy Pattern we would create a generic `interface` with some command contract like `publish` in to, and every different platform will have a different strategy class which implement the `interface`. We would also have a `publisher` class that can be injected an `publish interface` and do all the jobs need to push an article.

##Question #5.5
Using a real-world project that you were involved in, describe the architectual design of the system.
In your answer, include the following:
• What was the purpose of the system?
• What technologies were used?
• How were the technologies implemented and how did they interact with each other?
• What potential problems did the design resolve?
• What issues were encountered during the design?
• What would you do differently next time?

> __Answer:__
>
>I'm currently involved in an event driven project. The purpose of that system is improving the overall website performance. It's a generic event bus system that allow different stream in the same event bus and based on the rule we defined, different consumer will triggered.
>
>The are using lots of services provided by AWS. The service involved is AWS S3 for storing the event contents, AWS DynamoDB for storing metadata of the event and for trigger the stream, AWS lambda functions for producer/consumer, ecs with docker containers for traditional php application, AWS API Gateway to receive event contents.
>
>Most of them are implemented using the [Serverless Framework](https://serverless.com/), the other infrastructure is in CloudFormation. Main workflow is done by [DynamoDB Stream](https://docs.aws.amazon.com/amazondynamodb/latest/developerguide/Streams.Lambda.html). The process is like follow:
>   1. php application get some new data (e.g. court actions)
>   2. It will send data to a lambda function via api gateway with some authentication.
>   3. Lambda function will store the event data in s3 using json format, put the metadata into DynamoDB
>   4. Once DynamoDB receive the metadata, it will trigger the consumer lambda functions
>   5. Consumer lambda functions will consume the data in the s3 bucket
>
>The design resolve the issue of slow performance will we fetch cross directorship (same person are the director of multiple company and we can identify the potential risk of company b based on the company a if they have the same person as director).
>
>We did actually find some issue when we do the design. We initially planning to use DynamoDB to store event content but then we realise the information coming from ASIC for big companies like Woolworth is insanely big. However DynamoDB has the limitation of each item (400KB). So we solve the issue by storing the event data into s3 and only use DynamoDB as storage of metadata.
>
>Next time probably will use AWS EventBridge, considering it's still a new service and we are not really sure if it will have some major issue that will potentially affect production environment, but will definitely try next time.
