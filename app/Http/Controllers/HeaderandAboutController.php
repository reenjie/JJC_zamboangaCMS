<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Aboutus;
use App\Models\Blogs;
use App\Models\Header_video;
use App\Models\subscription;
use App\Models\Header;
use App\Models\photos;

class HeaderandAboutController extends Controller
{

    public function storevideo(Request $request)
    {
        $videolink = $request->videolink;

        Header_video::create([
            'videolinks' => $videolink
        ]);

        return redirect()->back()->with('success', 'Videolinks added Successfully!');
    }

    public function savePhoto(Request $request)
    {
        $photofile = $request->file('photofile');
        $id = $request->id;

        $data = Aboutus::findorFail($id);

        foreach ($photofile as $key => $value) {

            $value->move(public_path('assets/img'), $value->getClientOriginalName());


            // if ($data->photo == "stats-img.jpg") {


            //     $data->update([
            //         'photo' => $photofile->getClientOriginalName()
            //     ]);
            // } else {
            //     $unlinksrc = public_path('assets/img') . '/' . $data->photo;

            //     if (file_exists($unlinksrc)) {
            //         unlink($unlinksrc);
            //     }

            //     $data->update([
            //         'photo' => $photofile->getClientOriginalName()
            //     ]);
            // }


            photos::create([
                'photos' => $value->getClientOriginalName(),
                'fkid' => $id,
                'photo_type' => 'header'
            ]);
        }






        return redirect()->back()->with('success', 'Photo Change Successfully!');
    }

    public function updateAllWritten(Request $request)
    {
        $id = $request->id;
        $table = $request->table;
        $entity = $request->entity;
        $value = $request->value;

        DB::select('UPDATE `' . $table . '` SET `' . $entity . '` = "' . $value . '"  WHERE id = ' . $id . ' ');
    }

    public function deletevlinks(Request $request)
    {
        $id = $request->id;
        if (Header_video::findorFail($id)->delete()) {
            echo "success";
        }
    }

    public function viewblogs(Request $request)
    {
        $id = $request->id;
        $num = $request->num;


        $blog = Blogs::findorFail($id);

        if ($num) {
            $cat = DB::select('SELECT * FROM `categories`  where category = "' . $num . '" ');
        } else {
            $cat = DB::select('SELECT * FROM `categories` ');
        }

        if (count($cat) == 0) {
?>
            <h5 style="text-align: center;">NO DATA FOUND</h5>
        <?php
            return false;
        }
        $allphoto = DB::select('SELECT * FROM `photos` where fkid = ' . $id . ' and photo_type ="blogs" ');
        ?>
        <div id="carousel-indicator" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel-indicator" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel-indicator" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel-indicator" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">



                <?php
                foreach ($allphoto as $key => $pp) {

                    if ($key == 0) {
                ?>
                        <div class="carousel-item active">
                            <img class="d-block" style="width: 100%;height:400px" src="assets/img/<?php echo $pp->photos ?>" alt="First slide">
                        </div>
                    <?php

                    } else {
                    ?>
                        <div class="carousel-item ">
                            <img class="d-block" style="width: 100%;height:400px" src="<?php echo asset('assets/img/' . $pp->photos) ?>" alt="First slide">
                        </div>
                <?php

                    }
                }

                ?>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-indicator" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel-indicator" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
        <h1><?php echo $blog->title ?>
            <p style="font-size:12px;color:grey">

                <?php
                foreach ($cat as $categ) {
                    if ($categ->id == $blog->category) {
                        echo $categ->category;
                    }
                }
                ?>
            </p>

        </h1>

        <p><?php echo $blog->description ?></p>
<?php
    }
    public function subscribe(Request $request)
    {
        $email = $request->email;

        $validate = subscription::where('email', $email);
        if (count($validate->get()) >= 1) {
            return redirect()->back()->with('duplicate', 'But You are already a subscribers');
        }
        subscription::create([
            'email' => $email
        ]);
        //     //return redirect()->back()->with('success','Thank you for Subscribing!');
        return redirect()->route('sendConfirm', ['email' => $email]);
    }

    public function uploadlogo(Request $request)
    {
        $linkage = Header::where('id', 1);


        if ($linkage->get()[0]->logo != 'jjc-logo.png') {
            $src = public_path('assets/img/' . $linkage->get()[0]->logo);
            if (file_exists($src)) {
                unlink($src);
            }
        }
        $newlogo = $request->file('newlogo');
        $newlogo->move(public_path('assets/img/'), $newlogo->getClientOriginalName());

        Header::where('id', 1)->update([
            'logo' => $newlogo->getClientOriginalName()
        ]);

        return redirect()->back()->with('success', 'Logo changed successfully!');
    }
}
