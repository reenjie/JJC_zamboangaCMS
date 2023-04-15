<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Header;
use App\Models\Aboutus;
use App\Models\Header_video;
use App\Models\Contactdetails;
use App\Models\Footer;
use App\Models\Team;
use App\Models\Blogs;
use App\Models\Events;
use App\Models\Project;
use App\Models\Description;
use App\Models\photos;

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
            'welcome_desc'    => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, sed.',
            'logo'            => 'jjc-logo.png'
        ]);

        Aboutus::create([
            'title' => 'JCC VALUES',
            'subtitle' => 'We believe:',
            'desc' => "That Faith in God gives meaning and purpose to human life;
        That the Brotherhood of men transcends the sovereignty of nations;
        That Economic Justice can best be won by free men through free enterprise;
        That Government should be of laws rather than of men;
        That Earth's great treasure lies in human personality; and
        That Service to Humanity is the best work of life.",
            'mission_desc' => "To provide development opportunities that empower young people to create positive change.",
            'vision_desc' => "To be the leading global network of young active citizens.",

        ]);

        photos::create([

            'photos' => 'stats-img.jpg',
            'fkid' => 1,
            'photo_type' => 'header'

        ]);

        Header_video::create([
            'videolinks' => "https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2Fjjczamboanga2021%2Fvideos%2F3038624199732640%2F&show_text=false&width=560&t=0",
        ]);

        Contactdetails::create([
            'location' => "A108 Adam Street, New York, NY 535022",
            'email' => "jjczamboanga2021@gmail.com",
            'phonedetails' => "09166476708 or 09458459056",
            'opendetails' => "Mon-Sat: 8AM - 8PM",
            'facebook' => "https://www.facebook.com/jjczamboanga2021/",
            'twitter' => "https://twitter.com/JJCZamboanga",
            'instagram' => "https://www.instagram.com/jjc.zamboanga/",
            'linkedin' => "linkedinlink",
        ]);

        Footer::create([
            'p1' => "Let's keep in touch",
            'p2' => "Subscribe to keep up with fresh news and exciting updates.
        We promise not to spam you!",
            'desc' => "Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus."
        ]);


        Team::create([
            'photo' => "team-1.jpg",
            'name' => "Rishel Dionaldo",
            'desc' => "President",
            'facebook' => "",
            'twitter' => "",
            'instagram' => "",
            'linkedin' => "",
            'dump' => 0
        ]);

        Team::create([
            'photo' => "team-2.jpg",
            'name' => "Sarah Jhinson",
            'desc' => "Marketing",
            'facebook' => "",
            'twitter' => "",
            'instagram' => "",
            'linkedin' => "",
            'dump' => 0
        ]);

        Team::create([
            'photo' => "team-3.jpg",
            'name' => "William Anderson",
            'desc' => "Content",
            'facebook' => "",
            'twitter' => "",
            'instagram' => "",
            'linkedin' => "",
            'dump' => 0
        ]);

        Team::create([
            'photo' => "team-4.jpg",
            'name' => "Amanda Jepson",
            'desc' => "Accountant",
            'facebook' => "",
            'twitter' => "",
            'instagram' => "",
            'linkedin' => "",
            'dump' => 0
        ]);

        Team::create([
            'photo' => "team-5.jpg",
            'name' => "Amanda Jepson",
            'desc' => "Accountant",
            'facebook' => "",
            'twitter' => "",
            'instagram' => "",
            'linkedin' => "",
            'dump' => 0
        ]);

        Team::create([
            'photo' => "team-6.jpg",
            'name' => "Amanda Jepson",
            'desc' => "Accountant
            ",
            'facebook' => "",
            'twitter' => "",
            'instagram' => "",
            'linkedin' => "",
            'dump' => 0
        ]);

        Team::create([
            'photo' => "team-7.jpg",
            'name' => "Amanda Jepson",
            'desc' => "Accountant
            ",
            'facebook' => "",
            'twitter' => "",
            'instagram' => "",
            'linkedin' => "",
            'dump' => 0
        ]);
        Team::create([
            'photo' => "team-8.jpg",
            'name' => "Amanda Jepson",
            'desc' => "Accountant
            ",
            'facebook' => "",
            'twitter' => "",
            'instagram' => "",
            'linkedin' => "",
            'dump' => 0
        ]);






        Description::create([
            'desctype' => "Recent Blog Post",
            'desc' => "Consequatur1 libero assumenda est voluptatem est quidem illum et officia imilique qui vel architecto accusamus fugit aut qui distinctio",
        ]);

        Description::create([
            'desctype' => "Latest Events",
            'desc' => "Consequatur2 libero assumenda est voluptatem est quidem illum et officia imilique qui vel architecto accusamus fugit aut qui distinctio",
        ]);

        Description::create([
            'desctype' => "Projects",
            'desc' => "Consequatur3 libero assumenda est voluptatem est quidem illum et officia imilique qui vel architecto accusamus fugit aut qui distinctio",
        ]);

        Description::create([
            'desctype' => "Our Team",
            'desc' => "Consequatur4 libero assumenda est voluptatem est quidem illum et officia imilique qui vel architecto accusamus fugit aut qui distinctio",
        ]);

        Description::create([
            'desctype' => "Contact",
            'desc' => "Consequatur5 libero assumenda est voluptatem est quidem illum et officia imilique qui vel architecto accusamus fugit aut qui distinctio",
        ]);

        Description::create([
            'desctype' => "Membership Form",
            'desc' => "Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.",
        ]);

        Description::create([
            'desctype' => "Pledge Form",
            'desc' => "Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.",
        ]);
        Description::create([
            'desctype' => "Volunteer Form",
            'desc' => "Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.",
        ]);

        Description::create([
            'desctype' => "Partnership Form",
            'desc' => "Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.",
        ]);
    }
}
