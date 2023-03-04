<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Header;
use App\Models\Aboutus;
use App\Models\Header_video;
use App\Models\Contactdetails;
use App\Models\Footer;
class headerandAboutusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Header::create([
        'welcome_message' => 'Welcome to JJC Zamboanga',
        'welcome_desc'    => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, sed.'
        ]);

        Aboutus::create([
        'title' => 'JCC VALUES',
        'subtitle' => 'We believe:',
        'desc' =>"That Faith in God gives meaning and purpose to human life;
        That the Brotherhood of men transcends the sovereignty of nations;
        That Economic Justice can best be won by free men through free enterprise;
        That Government should be of laws rather than of men;
        That Earth's great treasure lies in human personality; and
        That Service to Humanity is the best work of life.",
        'mission_desc' => "To provide development opportunities that empower young people to create positive change.",
        'vision_desc' => "To be the leading global network of young active citizens.",
        'photo' => "stats-img.jpg",
        ]);

        Header_video::create([
            'videolinks'=> "https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2Fjjczamboanga2021%2Fvideos%2F3038624199732640%2F&show_text=false&width=560&t=0",
        ]);

        Contactdetails::create([
            'location'=>"A108 Adam Street, New York, NY 535022",
            'email'=>"jjczamboanga2021@gmail.com",
            'phonedetails'=>"09166476708 or 09458459056",
            'opendetails'=>"Mon-Sat: 8AM - 8PM",
            'facebook'=>"https://www.facebook.com/jjczamboanga2021/",
            'twitter'=>"https://twitter.com/JJCZamboanga",
            'instagram'=>"https://www.instagram.com/jjc.zamboanga/",
            'linkedin' =>"linkedinlink",
        ]);

        Footer::create([
        'p1'=>"Let's keep in touch",
        'p2'=>"Subscribe to keep up with fresh news and exciting updates.
        We promise not to spam you!",
        'desc'=>"Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus."
        ]);


        
    }

   
}
