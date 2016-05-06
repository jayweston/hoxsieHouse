<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PostTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('posts')->insert(['avialable_at'=>'2017-04-12', 'user_id'=>'1', 'title'=>'The Start of Questival', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_1.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2016-04-04', 'user_id'=>'1', 'title'=>'Roaring Camp Railroad', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_2.html'), 'draft'=>'1']);
		DB::table('posts')->insert(['avialable_at'=>'2015-11-17', 'user_id'=>'1', 'title'=>'Page, Arizona Balloon Regatta', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_3.html'), 'draft'=>'1']);
		DB::table('posts')->insert(['avialable_at'=>'2015-11-15', 'user_id'=>'1', 'title'=>'Big Cottonwood Canyon in September', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_4.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2015-09-29', 'user_id'=>'1', 'title'=>'Park City - Final Day!', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_5.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2015-09-29', 'user_id'=>'1', 'title'=>'Park City Getaway - Saturday!', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_6.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2015-08-24', 'user_id'=>'1', 'title'=>'To Idaho in June!', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_7.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2015-05-03', 'user_id'=>'1', 'title'=>'Hiking Little Cottonwood Canyon', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_8.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-11-17', 'user_id'=>'1', 'title'=>'Las Vegas', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_9.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-11-06', 'user_id'=>'1', 'title'=>'Alpine Loop Scenic Drive', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_10.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-11-06', 'user_id'=>'1', 'title'=>'Cedar Breaks National Monument', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_11.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-10-20', 'user_id'=>'1', 'title'=>'Nebo Loop Scenic Drive', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_12.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-08-26', 'user_id'=>'1', 'title'=>'Exploring Pinedale, WY', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_13.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-08-26', 'user_id'=>'1', 'title'=>'Walk The Winds Teardrop Camper Meetup', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_14.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-07-09', 'user_id'=>'1', 'title'=>'Lake, Beatles Band &amp; Balloon Glow', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_15.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-06-25', 'user_id'=>'1', 'title'=>'Fremont Indian State Park', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_16.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-06-25', 'user_id'=>'1', 'title'=>'Salina Hot Air Balloons Weekend!', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_17.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-06-06', 'user_id'=>'1', 'title'=>'Sunday Morning Hot Air Balloons [Salina]', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_18.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-05-25', 'user_id'=>'1', 'title'=>'San Francisco Maritime National Historical Park', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_19.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-05-25', 'user_id'=>'1', 'title'=>'On our way to San Francisco!', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_20.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-04-29', 'user_id'=>'1', 'title'=>'Our 2014 Travel Plans [Spring &amp; Summer]', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_21.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-04-03', 'user_id'=>'1', 'title'=>'St. George Temple Visit', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_22.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-04-03', 'user_id'=>'1', 'title'=>'Weight Loss &amp; Selfies', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_23.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-04-03', 'user_id'=>'1', 'title'=>'Gunlock State Park', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_24.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-04-03', 'user_id'=>'1', 'title'=>'Saturday Night In St George', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_25.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-04-03', 'user_id'=>'1', 'title'=>'Pioneer Names Hike', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_26.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-03-31', 'user_id'=>'1', 'title'=>'Snow Canyon State Park', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_27.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-03-31', 'user_id'=>'1', 'title'=>'St. George Weekend!', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_28.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-01-04', 'user_id'=>'1', 'title'=>'Grand Tetons', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_29.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-01-04', 'user_id'=>'1', 'title'=>'Exploring Yellowstone', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_30.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2014-01-04', 'user_id'=>'1', 'title'=>'Hole In The Rock', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_31.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2013-11-14', 'user_id'=>'1', 'title'=>'Dam , Good Times', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_32.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2013-11-06', 'user_id'=>'1', 'title'=>'Balloon Regatta in Page, AZ', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_33.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2013-10-21', 'user_id'=>'1', 'title'=>'Chaco Culture National Historic Park', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_34.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2013-08-13', 'user_id'=>'1', 'title'=>'Salina &amp; Escalante', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_35.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2013-08-11', 'user_id'=>'1', 'title'=>'Salina Saturday Night', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_36.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2013-08-11', 'user_id'=>'1', 'title'=>'Great Basin Museum', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_37.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2013-08-07', 'user_id'=>'1', 'title'=>'Camping with the Teardrop in Salina, UT', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_38.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2013-07-16', 'user_id'=>'1', 'title'=>'Salina Hot Air Balloon Weekend', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_39.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2013-07-12', 'user_id'=>'1', 'title'=>'Dinner in Salina &amp; Camping', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_40.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2013-06-27', 'user_id'=>'1', 'title'=>'Golden Spike National Monument', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_41.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2013-06-25', 'user_id'=>'1', 'title'=>'ATK Visit on Memorial Day Weekend', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_42.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2013-06-03', 'user_id'=>'1', 'title'=>'Spiral Jetty', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_43.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2013-05-21', 'user_id'=>'1', 'title'=>'The Road to the Snowflake, AZ', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_44.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2013-04-29', 'user_id'=>'1', 'title'=>'We\'re Homeowners!', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_45.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2013-04-29', 'user_id'=>'1', 'title'=>'Heading Down to New Mexico', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_46.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2012-12-09', 'user_id'=>'1', 'title'=>'Goblin Valley!', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_47.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2012-08-16', 'user_id'=>'1', 'title'=>'Thousand Springs', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_48.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2012-02-23', 'user_id'=>'1', 'title'=>'Tonto Natural Bridge', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_49.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2011-10-16', 'user_id'=>'1', 'title'=>'Aztech Ruins in NM', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_50.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2011-10-15', 'user_id'=>'1', 'title'=>'Tent Rock National Park', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_51.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2011-10-15', 'user_id'=>'1', 'title'=>'Petroglyph National Monument', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_52.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2011-01-14', 'user_id'=>'1', 'title'=>'the WAVE', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_53.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2011-01-13', 'user_id'=>'1', 'title'=>'The Bat Cave', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_54.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2011-01-13', 'user_id'=>'1', 'title'=>'Saguaro National Park', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_55.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2011-01-13', 'user_id'=>'1', 'title'=>'Ostrich Farm', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_56.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2010-10-07', 'user_id'=>'1', 'title'=>'Tonto National Monument', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_57.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2010-10-07', 'user_id'=>'1', 'title'=>'Casa Grande National Monument', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_58.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2010-08-04', 'user_id'=>'1', 'title'=>'Montezuma Castle - AZ', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_59.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2010-08-04', 'user_id'=>'1', 'title'=>'Tuzigoot National Monument', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_60.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2010-08-04', 'user_id'=>'1', 'title'=>'Waterfall Spot', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_61.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2010-08-04', 'user_id'=>'1', 'title'=>'Hiking to Delicate Arch in Moab, Utah', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_62.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2010-08-04', 'user_id'=>'1', 'title'=>'Southern Utah', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_63.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2010-08-04', 'user_id'=>'1', 'title'=>'Timpanogos Cave in Utah', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_64.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2010-06-06', 'user_id'=>'1', 'title'=>'Mashup Up Pix', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_65.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2010-06-04', 'user_id'=>'1', 'title'=>'The Drive to Southern Utah', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_66.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2010-06-02', 'user_id'=>'1', 'title'=>'Utah Places', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_67.html')]);
		DB::table('posts')->insert(['avialable_at'=>'2010-06-02', 'user_id'=>'1', 'title'=>'Memorial Day Wknd in Southern Utah', 'type'=>'travel', 'content'=>file_get_contents(realpath(dirname(__FILE__)) . '/data/post_68.html')]);
	}
}
