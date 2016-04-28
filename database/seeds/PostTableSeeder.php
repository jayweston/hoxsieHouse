<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PostTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		DB::table('posts')->insert(['avialable_at'=>'2016-04-12', 'user_id'=>'1', 'title'=>'The Start of Questival', 'post_type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_1.html'), 'summary'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/summary_1.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2016-04-04', 'user_id'=>'1', 'title'=>'Roaring Camp Railroad', 'post_type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_2.html'), 'summary'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/summary_2.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2015-11-17', 'user_id'=>'1', 'title'=>'Page, Arizona Balloon Regatta', 'post_type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_3.html'), 'summary'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/summary_3.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2015-11-15', 'user_id'=>'1', 'title'=>'Big Cottonwood Canyon in September', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2015-09-29', 'user_id'=>'1', 'title'=>'Park City - Final Day!', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2015-09-29', 'user_id'=>'1', 'title'=>'Park City Getaway - Saturday!', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2015-08-24', 'user_id'=>'1', 'title'=>'To Idaho in June!', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2015-05-03', 'user_id'=>'1', 'title'=>'Hiking Little Cottonwood Canyon', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-11-17', 'user_id'=>'1', 'title'=>'Las Vegas', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-11-06', 'user_id'=>'1', 'title'=>'Alpine Loop Scenic Drive', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-11-06', 'user_id'=>'1', 'title'=>'Cedar Breaks National Monument', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-10-20', 'user_id'=>'1', 'title'=>'Nebo Loop Scenic Drive', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-08-26', 'user_id'=>'1', 'title'=>'Exploring Pinedale, WY', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-08-26', 'user_id'=>'1', 'title'=>'Walk The Winds Teardrop Camper Meetup', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-07-09', 'user_id'=>'1', 'title'=>'Lake, Beatles Band &amp; Balloon Glow', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-06-25', 'user_id'=>'1', 'title'=>'Fremont Indian State Park', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-06-25', 'user_id'=>'1', 'title'=>'Salina Hot Air Balloons Weekend!', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-06-06', 'user_id'=>'1', 'title'=>'Sunday Morning Hot Air Balloons [Salina]', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-05-25', 'user_id'=>'1', 'title'=>'San Francisco Maritime National Historical Park', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-05-25', 'user_id'=>'1', 'title'=>'On our way to San Francisco!', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-04-29', 'user_id'=>'1', 'title'=>'Our 2014 Travel Plans [Spring &amp; Summer]', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-04-03', 'user_id'=>'1', 'title'=>'St. George Temple Visit', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-04-03', 'user_id'=>'1', 'title'=>'Weight Loss &amp; Selfies', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-04-03', 'user_id'=>'1', 'title'=>'Gunlock State Park', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-04-03', 'user_id'=>'1', 'title'=>'Saturday Night In St George', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-04-03', 'user_id'=>'1', 'title'=>'Pioneer Names Hike', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-03-31', 'user_id'=>'1', 'title'=>'Snow Canyon State Park', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-03-31', 'user_id'=>'1', 'title'=>'St. George Weekend!', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-01-04', 'user_id'=>'1', 'title'=>'Grand Tetons', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-01-04', 'user_id'=>'1', 'title'=>'Exploring Yellowstone', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2014-01-04', 'user_id'=>'1', 'title'=>'Hole In The Rock', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2013-11-14', 'user_id'=>'1', 'title'=>'Dam , Good Times', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2013-11-06', 'user_id'=>'1', 'title'=>'Balloon Regatta in Page, AZ', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2013-10-21', 'user_id'=>'1', 'title'=>'Chaco Culture National Historic Park', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2013-08-13', 'user_id'=>'1', 'title'=>'Salina &amp; Escalante', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2013-08-11', 'user_id'=>'1', 'title'=>'Salina Saturday Night', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2013-08-11', 'user_id'=>'1', 'title'=>'Great Basin Museum', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2013-08-07', 'user_id'=>'1', 'title'=>'Camping with the Teardrop in Salina, UT', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2013-07-16', 'user_id'=>'1', 'title'=>'Salina Hot Air Balloon Weekend', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2013-07-12', 'user_id'=>'1', 'title'=>'Dinner in Salina &amp; Camping', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2013-06-27', 'user_id'=>'1', 'title'=>'Golden Spike National Monument', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2013-06-25', 'user_id'=>'1', 'title'=>'ATK Visit on Memorial Day Weekend', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2013-06-03', 'user_id'=>'1', 'title'=>'Spiral Jetty', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2013-05-21', 'user_id'=>'1', 'title'=>'The Road to the Snowflake, AZ', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2013-04-29', 'user_id'=>'1', 'title'=>'We\'re Homeowners!', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2013-04-29', 'user_id'=>'1', 'title'=>'Heading Down to New Mexico', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2012-12-09', 'user_id'=>'1', 'title'=>'Goblin Valley!', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2012-08-16', 'user_id'=>'1', 'title'=>'Thousand Springs', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2012-02-23', 'user_id'=>'1', 'title'=>'Tonto Natural Bridge', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2011-10-16', 'user_id'=>'1', 'title'=>'Aztech Ruins in NM', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2011-10-15', 'user_id'=>'1', 'title'=>'Tent Rock National Park', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2011-10-15', 'user_id'=>'1', 'title'=>'Petroglyph National Monument', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2011-01-14', 'user_id'=>'1', 'title'=>'the WAVE', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2011-01-13', 'user_id'=>'1', 'title'=>'The Bat Cave', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2011-01-13', 'user_id'=>'1', 'title'=>'Saguaro National Park', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2011-01-13', 'user_id'=>'1', 'title'=>'Ostrich Farm', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2010-10-07', 'user_id'=>'1', 'title'=>'Tonto National Monument', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2010-10-07', 'user_id'=>'1', 'title'=>'Casa Grande National Monument', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2010-08-04', 'user_id'=>'1', 'title'=>'Montezuma Castle - AZ', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2010-08-04', 'user_id'=>'1', 'title'=>'Tuzigoot National Monument', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2010-08-04', 'user_id'=>'1', 'title'=>'Waterfall Spot', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2010-08-04', 'user_id'=>'1', 'title'=>'Hiking to Delicate Arch in Moab, Utah', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2010-08-04', 'user_id'=>'1', 'title'=>'Southern Utah', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2010-08-04', 'user_id'=>'1', 'title'=>'Timpanogos Cave in Utah', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2010-06-06', 'user_id'=>'1', 'title'=>'Mashup Up Pix', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2010-06-04', 'user_id'=>'1', 'title'=>'The Drive to Southern Utah', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2010-06-02', 'user_id'=>'1', 'title'=>'Utah Places', 'post_type'=>'travel']);
		DB::table('posts')->insert(['avialable_at'=>'2010-06-02', 'user_id'=>'1', 'title'=>'Memorial Day Wknd in Southern Utah', 'post_type'=>'travel']);
	}
}
