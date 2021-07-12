<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Register */

get_header(); 
?>
<div class="content-block-container">
    <div class="container container1">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s">

            <?php 
            $approved = array('post_type'  =>'college-record', 'post_status' => 'publish','author'  => get_current_user_id());
            $pending =  array('post_type'  =>'college-record', 'post_status'  => 'pending','author'  => get_current_user_id());
            $approved_posts = get_posts($approved);
            $pending_posts = get_posts($pending);
            if(!$approved_posts):
            ?>
            <div class="col-md-12">
                <?php if($_POST['post_submit']=='Submit'){ ;
                $email = $_POST['email'];
                $father_name = $_POST['father_name'];
                $gender = $_POST['gender'];
                $dob = $_POST['dob'];
                $blood_group = $_POST['blood_group'];
                $marital_status = $_POST['marital_status'];
                $cast = $_POST['cast'];
                $nationality = $_POST['nationality'];
                $contact_number = $_POST['contact_number'];
                $alternate_number = $_POST['alternate_number'];

                $studied_in_social_welfare_residential_school = $_POST['studied_in_social_welfare_residential_school'];
                $social_welfare_residential_education = $_POST['social_welfare_residential_education'];
                $district_name = $_POST['district_name'];
                $school_name_with_address = $_POST['school_name_with_address'];
                $joining_date = $_POST['joining_date'];
                $passout_date = $_POST['passout_date'];
                $studied_in_social_welfare_residential_college = $_POST['studied_in_social_welfare_residential_college'];
                $studied_in_social_welfare_degree_college = $_POST['studied_in_social_welfare_degree_college'];

                $type = $_POST['type'];
                $sector = $_POST['sector'];
                $at_label = $_POST['at_label'];

                $pin_code = $_POST['pin_code'];
                $address = $_POST['address'];
                $region = $_POST['region'];
                $city = $_POST['city'];
                $district = $_POST['district'];
                $state = $_POST['state'];

                $home_pin_code = $_POST['home_pin_code'];
                $home_address = $_POST['home_address'];
                $home_region = $_POST['home_region'];
                $home_city = $_POST['home_city'];
                $home_district = $_POST['home_district'];
                $home_state = $_POST['home_state'];

                $want_to_contributes = $_POST['want_to_contributes'];
                $about_you = $_POST['about_you'];
                
                

                $id = wp_insert_post(
                    array(
                        'post_title'=>$_POST['post_title'], 
                        'post_type'=>'college-record', 
                        'post_status' => 'pending',
                        'comment_status' => 'closed',
                        'ping_status' => 'closed',
                        )
                    );
                }

                //$post = get_post(548);
                //wp_update_post($post);




                add_post_meta($id, 'email', $email, true);
                add_post_meta($id, 'father_name', $father_name, true);
                add_post_meta($id, 'gender', $gender, true);
                add_post_meta($id, 'dob', $dob, true);
                add_post_meta($id, 'blood_group', $blood_group, true);
                add_post_meta($id, 'marital_status', $marital_status, true);

                add_post_meta($id, 'cast', $cast, true);
                add_post_meta($id, 'nationality', $nationality, true);
                add_post_meta($id, 'contact_number', $contact_number, true);
                add_post_meta($id, 'alternate_number', $alternate_number, true);
                add_post_meta($id, 'studied_in_social_welfare_residential_school', $studied_in_social_welfare_residential_school, true);
                add_post_meta($id, 'social_welfare_residential_education', $social_welfare_residential_education, true);
                add_post_meta($id, 'district_name', $district_name, true);
                add_post_meta($id, 'school_name_with_address', $school_name_with_address, true);
                add_post_meta($id, 'joining_date', $joining_date, true);
                add_post_meta($id, 'passout_date', $passout_date, true);
                add_post_meta($id, 'studied_in_social_welfare_residential_college', $studied_in_social_welfare_residential_college, true);
                add_post_meta($id, 'studied_in_social_welfare_degree_college', $studied_in_social_welfare_degree_college, true);


                add_post_meta($id, 'type', $type, true);
                add_post_meta($id, 'sector', $sector, true);
                add_post_meta($id, 'at_label', $at_label, true);

                add_post_meta($id, 'pin_code', $pin_code, true);
                add_post_meta($id, 'address', $address, true);
                add_post_meta($id, 'region', $region, true);
                add_post_meta($id, 'city', $city, true);
                add_post_meta($id, '$district', $$district, true);
                add_post_meta($id, 'state', $state, true);

                add_post_meta($id, 'home_pin_code', $home_pin_code, true);
                add_post_meta($id, 'home_address', $home_address, true);
                add_post_meta($id, 'home_region', $home_region, true);
                add_post_meta($id, '$home_city', $$home_city, true);
                add_post_meta($id, 'home_district', $home_district, true);
                add_post_meta($id, 'home_state', $home_state, true);

                add_post_meta($id, 'want_to_contributes', $want_to_contributes, true);
                add_post_meta($id, 'about_you', $about_you, true);
      
                $email = get_post_meta(548, 'email');
                $father_name = get_post_meta(548, 'father_name');
                $dob = get_post_meta(548, 'dob');
                $blood_group = get_post_meta(548, 'blood_group');
                $cast = get_post_meta(548, 'cast');
                $nationality = get_post_meta(548, 'nationality');
                $gender = get_post_meta(548, 'gender');
                $contact_number = get_post_meta(548, 'contact_number');
                $alternate_number = get_post_meta(548, 'alternate_number');
                $district_name = get_post_meta(548, 'district_name');
                $school_name_with_address = get_post_meta(548, 'school_name_with_address');
                $joining_date = get_post_meta(548, 'joining_date');
                $passout_date = get_post_meta(548, 'passout_date');
                $pin_code = get_post_meta(548, 'pin_code');
                $address = get_post_meta(548, 'address');
                $region = get_post_meta(548, 'region');
                $city = get_post_meta(548, 'city');
                $district = get_post_meta(548, 'district');
                $state = get_post_meta(548, 'state');
                $marital_status = get_post_meta(548, 'marital_status');
                $home_pin_code = get_post_meta(548, 'home_pin_code');
                $home_address = get_post_meta(548, 'home_address');
                $home_region = get_post_meta(548, 'home_region');
                $home_city = get_post_meta(548, 'home_city');
                $home_district = get_post_meta(548, 'home_district');
                $home_state = get_post_meta(548, 'home_state');
                $want_to_contributes = get_post_meta(548, 'want_to_contributes');
                $about_you = get_post_meta(548, 'about_you');
                $test1 = get_post_meta(548, 'studied_in_social_welfare_residential_school');
                $test2 = get_post_meta(548, 'social_welfare_residential_education');
                $test3 = get_post_meta(548, 'studied_in_social_welfare_residential_college');
                $test4 = get_post_meta(548, 'studied_in_social_welfare_degree_college');
                $test5 = get_post_meta(548, 'type');
                $test6 = get_post_meta(548, 'sector');
                $test7 = get_post_meta(548, 'at_label');
                $test8 = get_post_meta(548, 'want_to_contributes');


                $collection = array();
                $collection['state'] = $_POST['state'];
                $collection['district'] = $_POST['district'];
                $collection['city'] = $_POST['city'];
                update_post_meta($id, 'do_collection', $collection);


                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                require_once(ABSPATH . "wp-admin" . '/includes/file.php');
                require_once(ABSPATH . "wp-admin" . '/includes/media.php');
                $attachment_id = media_handle_upload('file', $post_id);
                if (!is_wp_error($attachment_id)) { 
                    set_post_thumbnail($id, $attachment_id);
                }

                ?>
                    <form id="song-entry" name="post_entry" method="post" action="<?php echo get_page_link('/') ?>" enctype="multipart/form-data">
                    <h2 class="text-center">Basic Information</h2>
                    <p>
                        <label>Full Name</label><br />
                        <input class="form-control" type="text" id="post_title" name="post_title" />
                    </p>
                    <p>
                        <label>Email</label><br />
                        <input class="form-control" type="email" id="email" name="email" value="<?php echo $email[0]; ?>"/>
                    </p>
                    <p>
                        <label>Father Name</label><br />
                        <input class="form-control" type="text" id="father_name" name="father_name" value="<?php echo $father_name[0]; ?>"/>
                    </p>
                    <p>
                        <label>Gender</label><br />
                        <input class="form-control" type="text" id="gender" name="gender" value="<?php echo $gender[0]; ?>"/>
                    </p>
                    <p>
                        <label>D.O.B.</label><br />
                        <input class="form-control" type="date" id="dob" name="dob" value="<?php echo $dob[0]; ?>"/>
                    </p>
                    <p>
                        <label>Blood Group</label><br />
                        <input class="form-control" type="text" id="blood_group" name="blood_group" value="<?php echo $blood_group[0]; ?>"/>
                    </p>
                    <p>
                        <label>Marital Status</label><br />
                        <input class="form-control" type="text" id="marital_status" name="marital_status" value="<?php echo $marital_status[0]; ?>"/>
                    </p>
                    <p>
                        <label>Cast</label><br />
                        <input class="form-control" type="text" id="cast" name="cast" value="<?php echo $cast[0]; ?>"/>
                    </p>
                    <p>
                        <label>Nationality</label><br />
                        <input class="form-control" type="text" id="nationality" name="nationality" value="<?php echo $nationality[0]; ?>"/>
                    </p>
                    <p>
                        <label>Contact Number</label><br />
                        <input class="form-control" type="text" id="contact_number" name="contact_number" value="<?php echo $contact_number[0]; ?>"/>
                    </p>
                    <p>
                        <label>Alternate Number</label><br />
                        <input class="form-control" type="text" id="alternate_number" name="alternate_number" value="<?php echo $alternate_number[0]; ?>"/>
                    </p>
                    <p>
                        <label for="file">Filename:</label>
                        <input type="file" name="file" id="file"><br>
                    </p>
                    <h2 class="text-center">Education Information</h2>
                    <p>
                        <h6>Studied in social welfare Residential School</h6><br />
                        <label for="yes">Yes</label>
                        <input type="radio" id="yes" name="studied_in_social_welfare_residential_school" value="yes" <?php if($test1[0] =='yes'): echo 'checked'; endif; ?>>
                         <label for="no">No</label>
                        <input type="radio" id="no" name="studied_in_social_welfare_residential_school" value="no" <?php if($test1[0] =='no'): echo 'checked'; endif; ?>>
                    </p>
                    <p>
                        <label for="andhra_social_welfare">Studied in Andhra Pradesh Social Welfare Residential Education Institutions Society (APSWREIS)</label>
                        <input type="radio" id="andhra_social_welfare" name="social_welfare_residential_education" value="yes" <?php if($test2[0] =='yes'): echo 'checked'; endif; ?>>
                        <label for="telangana_social_welfare">Studied in Telangana Social Welfare Residential Education Institution Society (TSWREIS)</label>
                        <input type="radio" id="telangana_social_welfare" name="social_welfare_residential_education" value="no" <?php if($test2[0] =='no'): echo 'checked'; endif; ?>>
                    </p>
                    <p>
                        <label>District name</label><br />
                        <input class="form-control" type="text" id="district_name" name="district_name" value="<?php echo $district_name[0]; ?>"/>
                    </p>
                    
                    <p>
                        <label>School Name With Address</label><br />
                        <textarea id="school_name_with_address" name="school_name_with_address" rows="4" cols="100"><?php echo $school_name_with_address[0]; ?></textarea>
                    </p>
                    <p>
                        <label>Joining Date</label><br />
                        <input type="date" id="joining_date" name="joining_date" value="<?php echo $joining_date[0]; ?>">
                    </p>
                    <p>
                        <label>Passout Date</label><br />
                        <input type="date" id="passout_date" name="passout_date" value="<?php echo $passout_date[0]; ?>">
                    </p>
                    <p>
                        <h6>Studied in social welfare Residential College</h6><br />
                        <label for="yes">Yes</label>
                        <input type="radio" id="yes" name="studied_in_social_welfare_residential_college" value="yes"  <?php if($test3[0] =='yes'): echo 'checked'; endif; ?>>
                         <label for="no">No</label>
                        <input type="radio" id="no" name="studied_in_social_welfare_residential_college" value="no"  <?php if($test3[0] =='no'): echo 'checked'; endif; ?>>
                    </p>
                    <p>
                        <h6>Studied in social welfare degree College</h6><br />
                        <label for="yes">Yes</label>
                        <input type="radio" id="yes" name="studied_in_social_welfare_degree_college" value="yes" <?php if($test4[0] =='yes'): echo 'checked'; endif; ?>>
                         <label for="no">No</label>
                        <input type="radio" id="no" name="studied_in_social_welfare_degree_college" value="no" <?php if($test4[0] =='no'): echo 'checked'; endif; ?>>
                    </p>
                    <h2 class="text-center">Profession</h2>
                    <p>
                        <h6>Type</h6><br />
                        <label for="working">Working</label>
                        <input type="radio" id="working" name="type" value="working" <?php if($test5[0] =='working'): echo 'checked'; endif; ?>>
                        <label for="student">Student</label>
                        <input type="radio" id="student" name="type" value="student" <?php if($test5[0] =='student'): echo 'checked'; endif; ?>>
                        <label for="job-seeker">Job Seeker</label>
                        <input type="radio" id="job-seeker" name="type" value="job-seeker" <?php if($test5[0] =='job-seeker'): echo 'checked'; endif; ?>>
                    </p>
                    <p>
                        <h6>Sector</h6><br />
                        <label for="government">Government</label>
                        <input type="radio" id="government" name="sector" value="government " <?php if($test6[0] =='government'): echo 'checked'; endif; ?>>
                        <label for="private">Private</label>
                        <input type="radio" id="private" name="sector" value="private" <?php if($test6[0] =='private'): echo 'checked'; endif; ?>>
                        <label for="self-employed">Self employed</label>
                        <input type="radio" id="self-employed" name="sector" value="self-employed" <?php if($test6[0] =='self-employed'): echo 'checked'; endif; ?>>
                    </p>
                    <p>
                        <h6>At Label</h6><br />
                        <label for="central">Central</label>
                        <input type="radio" id="central" name="at_label" value="central" <?php if($test7[0] =='central'): echo 'checked'; endif; ?>>
                        <label for="state">State</label>
                        <input type="radio" id="state" name="at_label" value="state" <?php if($test7[0] =='state'): echo 'checked'; endif; ?>>
                        <label for="public">Public</label>
                        <input type="radio" id="public" name="at_label" value="public" <?php if($test7[0] =='public'): echo 'checked'; endif; ?>>
                    </p>
                    <h2 class="text-center">Work Address </h2>
                    <p>
                        <label>Pin Code</label><br />
                        <input class="form-control" type="text" id="pin_code" name="pin_code" value="<?php echo $pin_code[0]; ?>"/>
                    </p>
                    <p>
                        <label>Address</label><br />
                        <input class="form-control" type="text" id="address" name="address" value="<?php echo $address[0]; ?>" />
                    </p>
                    <p>
                        <label>Region</label><br />
                        <input class="form-control" type="text" id="region" name="region" value="<?php echo $region[0]; ?>" />
                    </p>
                    <p>
                        <label>City</label><br />
                        <input class="form-control" type="text" id="city" name="city" value="<?php echo $city[0]; ?>" />
                    </p>
                    <p>
                        <label>District</label><br />
                        <input class="form-control" type="text" id="district" name="district" value="<?php echo $district[0]; ?>" />
                    </p>
                    <p>
                        <label>State</label><br />
                        <input class="form-control" type="text" id="state" name="state" value="<?php echo $state[0]; ?>" />
                    </p>
                    <h2 class="text-center">Home Address</h2>
                    <p>
                        <label>Pin Code</label><br />
                        <input class="form-control" type="text" id="home_pin_code" name="home_pin_code" value="<?php echo $home_pin_code[0]; ?>" />
                    </p>
                   <p>
                        <label>Address</label><br />
                        <input class="form-control" type="text" id="home_address" name="home_address" value="<?php echo $home_address[0]; ?>" />
                    </p>
                    <p>
                        <label>Region</label><br />
                        <input class="form-control" type="text" id="home_region" name="home_region" value="<?php echo $home_region[0]; ?>" />
                    </p>
                    <p>
                        <label>City</label><br />
                        <input class="form-control" type="text" id="home_city" name="home_city" value="<?php echo $home_city[0]; ?>" />
                    </p>
                    <p>
                        <label>District</label><br />
                        <input class="form-control" type="text" id="home_district" name="home_district" value="<?php echo $home_district[0]; ?>" />
                    </p>
                    <p>
                        <label>State</label><br />
                        <input class="form-control" type="text" id="home_state" name="home_state" value="<?php echo $home_state[0]; ?>" />
                    </p>
                    <p>
                        <label for="want_to_contributes">Want to contributes:</label>
                        <select name="want_to_contributes" id="want_to_contributes">
                          <option value="yes" <?php if($test8[0] =='yes'): echo 'selected'; endif; ?>>Yes</option>
                          <option value="no" <?php if($test8[0] =='no'): echo 'selected'; endif; ?>>No</option>
                        </select>
                        
                    </p>
                    <p>
                        <label for="about_you">About you in 100 words:</label><br />
                        <textarea id="about_you" name="about_you" rows="4" cols="100"><?php echo $about_you[0]; ?></textarea>
                    </p>

                    <p>
                        <input type="submit" name="post_submit" value="Submit" />
                    </p>
                </form>
            </div>
            <?php elseif($pending): ?>
                <div class="col-md-12">
                <?php if($_POST['post_submit']=='Submit'){ ;
                $email = $_POST['email'];
                $father_name = $_POST['father_name'];
                $gender = $_POST['gender'];
                $dob = $_POST['dob'];
                $blood_group = $_POST['blood_group'];
                $marital_status = $_POST['marital_status'];
                $cast = $_POST['cast'];
                $nationality = $_POST['nationality'];
                $contact_number = $_POST['contact_number'];
                $alternate_number = $_POST['alternate_number'];

                $studied_in_social_welfare_residential_school = $_POST['studied_in_social_welfare_residential_school'];
                $social_welfare_residential_education = $_POST['social_welfare_residential_education'];
                $district_name = $_POST['district_name'];
                $school_name_with_address = $_POST['school_name_with_address'];
                $joining_date = $_POST['joining_date'];
                $passout_date = $_POST['passout_date'];
                $studied_in_social_welfare_residential_college = $_POST['studied_in_social_welfare_residential_college'];
                $studied_in_social_welfare_degree_college = $_POST['studied_in_social_welfare_degree_college'];

                $type = $_POST['type'];
                $sector = $_POST['sector'];
                $at_label = $_POST['at_label'];

                $pin_code = $_POST['pin_code'];
                $address = $_POST['address'];
                $region = $_POST['region'];
                $city = $_POST['city'];
                $district = $_POST['district'];
                $state = $_POST['state'];

                $home_pin_code = $_POST['home_pin_code'];
                $home_address = $_POST['home_address'];
                $home_region = $_POST['home_region'];
                $home_city = $_POST['home_city'];
                $home_district = $_POST['home_district'];
                $home_state = $_POST['home_state'];

                $want_to_contributes = $_POST['want_to_contributes'];
                $about_you = $_POST['about_you'];


                $id = wp_insert_post(
                    array(
                        'post_title'=>$_POST['post_title'], 
                        'post_type'=>'college-record', 
                        'post_status' => 'pending',
                        'comment_status' => 'closed',
                        'ping_status' => 'closed',
                        )
                    );
                }

                add_post_meta($id, 'email', $email, true);
                add_post_meta($id, 'father_name', $father_name, true);
                add_post_meta($id, 'gender', $gender, true);
                add_post_meta($id, 'dob', $dob, true);
                add_post_meta($id, 'blood_group', $blood_group, true);
                add_post_meta($id, 'marital_status', $marital_status, true);

                add_post_meta($id, 'cast', $cast, true);
                add_post_meta($id, 'nationality', $nationality, true);
                add_post_meta($id, 'contact_number', $contact_number, true);
                add_post_meta($id, 'alternate_number', $alternate_number, true);
                add_post_meta($id, 'studied_in_social_welfare_residential_school', $studied_in_social_welfare_residential_school, true);
                add_post_meta($id, 'social_welfare_residential_education', $social_welfare_residential_education, true);
                add_post_meta($id, 'district_name', $district_name, true);
                add_post_meta($id, 'school_name_with_address', $school_name_with_address, true);
                add_post_meta($id, 'joining_date', $joining_date, true);
                add_post_meta($id, 'passout_date', $passout_date, true);
                add_post_meta($id, 'studied_in_social_welfare_residential_college', $studied_in_social_welfare_residential_college, true);
                add_post_meta($id, 'studied_in_social_welfare_degree_college', $studied_in_social_welfare_degree_college, true);


                add_post_meta($id, 'type', $type, true);
                add_post_meta($id, 'sector', $sector, true);
                add_post_meta($id, 'at_label', $at_label, true);

                add_post_meta($id, 'pin_code', $pin_code, true);
                add_post_meta($id, 'address', $address, true);
                add_post_meta($id, 'region', $region, true);
                add_post_meta($id, 'city', $city, true);
                add_post_meta($id, '$district', $$district, true);
                add_post_meta($id, 'state', $state, true);

                add_post_meta($id, 'home_pin_code', $home_pin_code, true);
                add_post_meta($id, 'home_address', $home_address, true);
                add_post_meta($id, 'home_region', $home_region, true);
                add_post_meta($id, '$home_city', $$home_city, true);
                add_post_meta($id, 'home_district', $home_district, true);
                add_post_meta($id, 'home_state', $home_state, true);

                add_post_meta($id, 'want_to_contributes', $want_to_contributes, true);
                add_post_meta($id, 'about_you', $about_you, true);
               


                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                require_once(ABSPATH . "wp-admin" . '/includes/file.php');
                require_once(ABSPATH . "wp-admin" . '/includes/media.php');
                $attachment_id = media_handle_upload('file', $post_id);
                if (!is_wp_error($attachment_id)) { 
                    set_post_thumbnail($id, $attachment_id);
                }

                ?>
                    <form id="song-entry" name="post_entry" method="post" action="<?php echo get_page_link('/') ?>" enctype="multipart/form-data">
                    <h2 class="text-center">Basic Information</h2>
                    <p>
                        <label>Full Name</label><br />
                        <input class="form-control" type="text" id="post_title" name="post_title" vslue="test-user" />
                    </p>
                    <p>
                        <label>Email</label><br />
                        <input class="form-control" type="email" id="email" name="email" />
                    </p>
                    <p>
                        <label>Father Name</label><br />
                        <input class="form-control" type="text" id="father_name" name="father_name" />
                    </p>
                    <p>
                        <label>Gender</label><br />
                        <input class="form-control" type="text" id="gender" name="gender" />
                    </p>
                    <p>
                        <label>D.O.B.</label><br />
                        <input class="form-control" type="date" id="dob" name="dob" />
                    </p>
                    <p>
                        <label>Blood Group</label><br />
                        <input class="form-control" type="text" id="blood_group" name="blood_group" />
                    </p>
                    <p>
                        <label>Marital Status</label><br />
                        <input class="form-control" type="text" id="marital_status" name="marital_status" />
                    </p>
                    <p>
                        <label>Cast</label><br />
                        <input class="form-control" type="text" id="cast" name="cast" />
                    </p>
                    <p>
                        <label>Nationality</label><br />
                        <input class="form-control" type="text" id="nationality" name="nationality" />
                    </p>
                    <p>
                        <label>Contact Number</label><br />
                        <input class="form-control" type="text" id="contact_number" name="contact_number" />
                    </p>
                    <p>
                        <label>Alternate Number</label><br />
                        <input class="form-control" type="text" id="alternate_number" name="alternate_number" />
                    </p>
                    <p>
                        <label for="file">Filename:</label>
                        <input type="file" name="file" id="file"><br>
                    </p>
                    <h2 class="text-center">Education Information</h2>
                    <p>
                        <h6>Studied in social welfare Residential School</h6><br />
                        <label for="yes">Yes</label>
                        <input type="radio" id="yes" name="studied_in_social_welfare_residential_school" value="yes">
                         <label for="no">No</label>
                        <input type="radio" id="no" name="studied_in_social_welfare_residential_school" value="no">
                    </p>
                    <p>
                        <label for="andhra_social_welfare">Studied in Andhra Pradesh Social Welfare Residential Education Institutions Society (APSWREIS)</label>
                        <input type="radio" id="andhra_social_welfare" name="social_welfare_residential_education" value="andhra_social_welfare">
                        <label for="telangana_social_welfare">Studied in Telangana Social Welfare Residential Education Institution Society (TSWREIS)</label>
                        <input type="radio" id="telangana_social_welfare" name="social_welfare_residential_education" value="telangana_social_welfare">
                    </p>
                    <p>
                        <label>District name</label><br />
                        <input class="form-control" type="text" id="district_name" name="district_name"/>
                    </p>
                    
                    <p>
                        <label>School Name With Address</label><br />
                        <textarea id="school_name_with_address" name="school_name_with_address" rows="4" cols="100"></textarea>
                    </p>
                    <p>
                        <label>Joining Date</label><br />
                        <input type="date" id="joining_date" name="joining_date">
                    </p>
                    <p>
                        <label>Passout Date</label><br />
                        <input type="date" id="passout_date" name="passout_date">
                    </p>
                    <p>
                        <h6>Studied in social welfare Residential College</h6><br />
                        <label for="yes">Yes</label>
                        <input type="radio" id="yes" name="studied_in_social_welfare_residential_college" value="yes">
                         <label for="no">No</label>
                        <input type="radio" id="no" name="studied_in_social_welfare_residential_college" value="no">
                    </p>
                    <p>
                        <h6>Studied in social welfare degree College</h6><br />
                        <label for="yes">Yes</label>
                        <input type="radio" id="yes" name="studied_in_social_welfare_degree_college" value="yes">
                         <label for="no">No</label>
                        <input type="radio" id="no" name="studied_in_social_welfare_degree_college" value="no">
                    </p>
                    <h2 class="text-center">Profession</h2>
                    <p>
                        <h6>Type</h6><br />
                        <label for="working">Working</label>
                        <input type="radio" id="working" name="type" value="working">
                        <label for="student">Student</label>
                        <input type="radio" id="student" name="type" value="student">
                        <label for="job-seeker">Job Seeker</label>
                        <input type="radio" id="job-seeker" name="type" value="job-seeker">
                    </p>
                    <p>
                        <h6>Sector</h6><br />
                        <label for="government">Government</label>
                        <input type="radio" id="government" name="sector" value="government ">
                        <label for="private">Private</label>
                        <input type="radio" id="private" name="sector" value="private">
                        <label for="self-employed">Self employed</label>
                        <input type="radio" id="self-employed" name="sector" value="self-employed">
                    </p>
                    <p>
                        <h6>At Label</h6><br />
                        <label for="central">Central</label>
                        <input type="radio" id="central" name="at_label" value="central">
                        <label for="state">State</label>
                        <input type="radio" id="state" name="at_label" value="state">
                        <label for="public">Public</label>
                        <input type="radio" id="public" name="at_label" value="public">
                    </p>
                    <h2 class="text-center">Work Address </h2>
                    <p>
                        <label>Pin Code</label><br />
                        <input class="form-control" type="text" id="pin_code" name="pin_code" />
                    </p>
                    <p>
                        <label>Address</label><br />
                        <input class="form-control" type="text" id="address" name="address" />
                    </p>
                    <p>
                        <label>Region</label><br />
                        <input class="form-control" type="text" id="region" name="region" />
                    </p>
                    <p>
                        <label>City</label><br />
                        <input class="form-control" type="text" id="city" name="city" />
                    </p>
                    <p>
                        <label>District</label><br />
                        <input class="form-control" type="text" id="district" name="district" />
                    </p>
                    <p>
                        <label>State</label><br />
                        <input class="form-control" type="text" id="state" name="state" />
                    </p>
                    <h2 class="text-center">Home Address</h2>
                    <p>
                        <label>Pin Code</label><br />
                        <input class="form-control" type="text" id="home_pin_code" name="home_pin_code" />
                    </p>
                   <p>
                        <label>Address</label><br />
                        <input class="form-control" type="text" id="home_address" name="home_address" />
                    </p>
                    <p>
                        <label>Region</label><br />
                        <input class="form-control" type="text" id="home_region" name="home_region" />
                    </p>
                    <p>
                        <label>City</label><br />
                        <input class="form-control" type="text" id="home_city" name="home_city" />
                    </p>
                    <p>
                        <label>District</label><br />
                        <input class="form-control" type="text" id="home_district" name="home_district" />
                    </p>
                    <p>
                        <label>State</label><br />
                        <input class="form-control" type="text" id="home_state" name="home_state" />
                    </p>
                    <p>
                        <label for="want_to_contributes">Want to contributes:</label>
                        <select name="want_to_contributes" id="want_to_contributes">
                          <option value="yes">Yes</option>
                          <option value="no">No</option>
                        </select>
                    </p>
                    <p>
                        <label for="about_you">About you in 100 words:</label><br />
                        <textarea id="about_you" name="about_you" rows="4" cols="100"></textarea>
                    </p>

                    <p>
                        <input type="submit" name="post_submit" value="Submit" />
                    </p>
                </form>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php wp_nonce_field( 'new_song_nonce' ); ?>
<?php
get_footer(); 
?>



