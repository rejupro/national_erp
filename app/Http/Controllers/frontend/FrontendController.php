<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContactMessage;
use Redirect;
use Auth;

class FrontendController extends Controller
{
    public function home()
    {
        $metadata['title'] = "PU And Epoxy Flooring Service In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution LTD Provide PU Flooring, Waterproofing, Epoxy Flooring, Polished Concrete, Vinyl Flooring, Service In Bangladesh With Affordable Price.";
        $metadata['keywords'] = "PU Flooring In Bangladesh, Epoxy Flooring In Bangladesh, Waterproofing in Bangladesh";
        return view('main.frontend.home',compact('metadata'));
    }
    public function about_us()
    {
        $metadata['title'] = "Industrial And Commercial Flooring Service | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Bangladesh Based Industrial, Commercial & Residential Flooring & Construction Chemicals Application Service Provider Company.";
        $metadata['keywords'] = "PU Flooring In Bangladesh, Epoxy Flooring In Bangladesh, Waterproofing in Bangladesh";
        return view('main.frontend.about',compact('metadata'));
    }
    public function services()
    {
        $metadata['title'] = "Industrial And Commercial Flooring Service | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Bangladesh Based Industrial, Commercial & Residential Flooring & Construction Chemicals Application Service Provider Company.";
        $metadata['keywords'] = "PU Flooring In Bangladesh, Epoxy Flooring In Bangladesh, Waterproofing in Bangladesh";
        return view('main.frontend.services',compact('metadata'));
    }
    public function polished_concrete()
    {
        $metadata['title'] = "Polished Concrete In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Polished Concrete in Bangladesh, Get Cleaned Concrete, waterproofing, Epoxy Floor Paint  best service with cheapest price in b By FalconconSolutionLtd.";
        $metadata['keywords'] = "Polished Concrete in Bangladesh, Polished Concrete";
        return view('main.frontend.polished_concrete',compact('metadata'));
    }
    public function epoxy_flooring(){
        $metadata['title'] = "Epoxy Flooring In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Epoxy Flooring in Bangladesh, Falcon Solution ltd provide best service with best price for Epoxy resin floor coating, Epoxy floor paint in Bangladesh.";
        $metadata['keywords'] = "Epoxy Flooring In Bangladesh, Epoxy Industrial Flooring In Bangladesh, Industrial Epoxy Flooring In Bangladesh";
        return view('main.frontend.epoxy_flooring',compact('metadata'));
    }
    public function pu_flooring(){
        $metadata['title'] = "PU Flooring In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "pu flooring in bangladesh, falconsolutionltd  provide pu Industrial flooring products contractor, supplier, manufacturer best service with cheapest price.";
        $metadata['keywords'] = "PU Flooring In Bangladesh, PU Industrial Flooring In Bangladesh, Industrial PU Flooring In Bangladesh";
        return view('main.frontend.pu_flooring',compact('metadata')); 
    }

    public function epoxy_parking(){
        $metadata['title'] = "Epoxy Parking In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "epoxy parking in bangladesh, epoxy parking";
        return view('main.frontend.epoxy_parking',compact('metadata'));   
    }

    public function self_leveling_epoxy_flooring(){
        $metadata['title'] = "Self Leveling Epoxy Flooring In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "self leveling epoxy flooring in bangladesh, self leveling epoxy flooring";
        return view('main.frontend.self_leveling_epoxy_flooring',compact('metadata')); 
    }

    public function metallic_epoxy_flooring(){
        $metadata['title'] = "Metallic Epoxy Flooring In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "metallic epoxy flooring in bangladesh, metallic epoxy flooring";
        return view('main.frontend.metallic_epoxy_flooring',compact('metadata'));
    }

    public function epoxy_3d_flooring(){
        $metadata['title'] = "3D Epoxy Flooring Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "3d epoxy flooring in bangladesh, 3d epoxy flooring";
        return view('main.frontend.epoxy_3d_flooring',compact('metadata'));
    }

    public function epoxy_wall_coating_and_paint(){
        $metadata['title'] = "Epoxy Wall Coating and Paint in Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "epoxy wall coating and paint in bangladesh, epoxy wall coating and paint";
        return view('main.frontend.epoxy_wall_coating_and_paint',compact('metadata'));
    }

    public function etp_protective_coating(){
        $metadata['title'] = "ETP Protective Coating in Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "etp protective coating in bangladesh, etp protective coating";
        return view('main.frontend.etp_protective_coating',compact('metadata'));
    }

    public function fair_face_plaster(){
        $metadata['title'] = "Fair Face Plaster | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "fair face plaster in bangladesh, fair face plaster";
        return view('main.frontend.fair_face_plaster',compact('metadata'));
    }

    public function vinyl_flooring(){
        $metadata['title'] = "Vinyl Flooring In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "Vinyl Flooring in Bangladesh, vinyl flooring solution, Vinyl Flooring";
        return view('main.frontend.vinyl_flooring',compact('metadata'));
    }

    public function waterproofing(){
        $metadata['title'] = "Waterproofing In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "waterproofing in bangladesh, waterproofing solution, waterproofing";
        return view('main.frontend.waterproofing',compact('metadata'));
    }

    public function dampproofing(){
        $metadata['title'] = "Damp Proofing In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Waterproofing In Bangladesh | Falcon Solution LTD is the best Concrete Waterproofing service provider Company in BD with cheapest price.";
        $metadata['keywords'] = "Damp Proofing in bangladesh, Damp Proofing";
        return view('main.frontend.dampproofing',compact('metadata'));
    }

    public function floor_hardener(){
        $metadata['title'] = "Floor Hardener In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Floor Hardener In Bangladesh, Falcon Solution Ltd Provide Best Service for Floor Hardener Solution With Best Price. If You Need Contact us Anytime.";
        $metadata['keywords'] = "Floori Hardener in bangladesh, Floori Hardener";
        return view('main.frontend.floor_hardener',compact('metadata'));
    }

    public function expansion_joint_work(){
        $metadata['title'] = "Expansion Joint Work In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "expansion joint work in bangladesh, expansion joint work";
        return view('main.frontend.expansion_joint_work',compact('metadata'));
    }

    public function construction_chemicals(){
        $metadata['title'] = "Construction Chemicals In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "construction chemecals in bangladesh, construction chemecals";
        return view('main.frontend.construction_chemicals',compact('metadata')); 
    }

    public function interior_design(){
        $metadata['title'] = "Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.interior_design',compact('metadata'));  
    }

    public function commercial_residential_flooring(){
        $metadata['title'] = "Commercial & Residential Flooring In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "commercial residential flooring in bangladesh, commercial residential flooring";
        return view('main.frontend.commercial_residential_flooring',compact('metadata')); 
    }

    public function pu_foam_spray(){
        $metadata['title'] = "PU Foam Spray In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "pu foam spray in bangladesh, pu foam spray";
        return view('main.frontend.pu_foam_spray',compact('metadata')); 
    }

    public function product_list(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "PU Flooring In Bangladesh, Epoxy Flooring In Bangladesh, Waterproofing in Bangladesh";
        return view('main.frontend.product_list',compact('metadata')); 
    }

    public function project_polished_concrete(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.project_polished_concrete',compact('metadata'));
    }

    public function projects(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.projects',compact('metadata'));
    }

    public function project_pu_flooring(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete auxiliaries in bangladesh, concrete auxiliaries";
        return view('main.frontend.project_pu_flooring',compact('metadata'));
    }

    public function project_vinyl_flooring(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.project_vinyl_flooring',compact('metadata'));
    }

    public function project_epoxy_flooring(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.project_epoxy_flooring',compact('metadata'));
    }

    public function project_epoxy_3d_flooring(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.project_epoxy_3d_flooring',compact('metadata'));
    }

    public function project_epoxy_marking(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.project_epoxy_marking',compact('metadata'));
    }

    public function project_epoxy_wall_coating_and_paint(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.project_epoxy_wall_coating_and_paint',compact('metadata'));
    }

    public function project_fair_face_plaster(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.project_fair_face_plaster',compact('metadata'));
    }

    public function project_pu_foam_spray(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.project_pu_foam_spray',compact('metadata'));
    }

    public function project_waterproofing(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.project_waterproofing',compact('metadata'));
    }

    public function project_floor_hardener(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.project_floor_hardener',compact('metadata'));  
    }

    public function project_expansion_joint_work(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.project_expansion_joint_work',compact('metadata'));  
    }


    public function project_interior_design(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.project_interior_design',compact('metadata'));
    }

    public function project_commercial_residential_flooring(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.project_commercial_residential_flooring',compact('metadata'));
    }

//.........................................Commented Out Files.........................................
    public function project_epoxy_parking_flooring(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.project_epoxy_parking_flooring',compact('metadata'));
    }

    public function project_self_leveling_epoxy_flooring(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.project_self_leveling_epoxy_flooring',compact('metadata'));
    }

    public function project_metallic_epoxy_flooring(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.project_metallic_epoxy_flooring',compact('metadata'));
    }

    public function project_etp_protective_coating(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.project_etp_protective_coating',compact('metadata'));
    }

    public function project_dampproofing(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.project_dampproofing',compact('metadata'));
    }

    public function project_construction_chemicals(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete";
        return view('main.frontend.project_construction_chemicals',compact('metadata'));
    }

    public function download(){
        $metadata['title'] = "Falcon Solution ltd | Epoxy Flooring in Bangladesh| PU Flooring in Bangladesh";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "PU Flooring In Bangladesh, Epoxy Flooring In Bangladesh, Waterproofing in Bangladesh";
        return view('main.frontend.download',compact('metadata'));
    }

//.........................................Start Of Commented Out Files.........................................

    public function meet_our_teams(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "PU Flooring In Bangladesh, Epoxy Flooring In Bangladesh, Waterproofing in Bangladesh";
        return view('main.frontend.meet_our_teams',compact('metadata'));
    }

    public function blog(){
        $metadata['title'] = "Falcon Solution ltd";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "PU Flooring In Bangladesh, Epoxy Flooring In Bangladesh, Waterproofing in Bangladesh";
        return view('main.frontend.blog',compact('metadata'));
    }

    public function contact_us(){
        $metadata['title'] = "Falcon Solution ltd | Epoxy Flooring in Bangladesh| PU Flooring in Bangladesh";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "PU Flooring In Bangladesh, Epoxy Flooring In Bangladesh, Waterproofing in Bangladesh";
        return view('main.frontend.contact_us',compact('metadata'));
    }
//.........................................End Of Commented Out Files.........................................


//.........................................Start Unused Functions & Files.........................................
        
    public function grouting(){
        $metadata['title'] = "Grouting In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "grouting in bangladesh, grouting";
        return view('main.frontend.grouting',compact('metadata'));  
    }


    public function repair_mortar(){
        $metadata['title'] = "Repair Morter In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "repair mortar in bangladesh, repair mortar";
        return view('main.frontend.repair_mortar',compact('metadata')); 
    }


    public function concrete_admixtures(){
        $metadata['title'] = "Concrete Admixtures In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete admixtures in bangladesh, oncrete admixtures";
        return view('main.frontend.concrete_admixtures',compact('metadata')); 
    }


    public function joint_sealants(){
        $metadata['title'] = "Joint Sealants In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "joint sealants in bangladesh, joint sealants";
        return view('main.frontend.joint_sealants',compact('metadata')); 
    }


    public function crack_repair_injection_systems(){
        $metadata['title'] = "Creck Repair Injection Systems In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "creck repair injection systems in bangladesh, bonding agents";
        return view('main.frontend.crack_repair_injection_systems',compact('metadata')); 
    }

    
    public function bonding_agents(){
        $metadata['title'] = "Bonding Agents In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "bonding agents in bangladesh, bonding agents";
        return view('main.frontend.bonding_agents',compact('metadata')); 
    }


    public function concrete_auxiliaries(){
        $metadata['title'] = "Concrete Auxiliaries In Bangladesh | Falcon Solution LTD";
        $metadata['description'] = "Falcon Solution Ltd is a Green & Sustainable Solution for Industrial, Commercial and Residential Flooring & Construction Chemicals.";
        $metadata['keywords'] = "concrete auxiliaries in bangladesh, concrete auxiliaries";
        return view('main.frontend.concrete_auxiliaries',compact('metadata')); 
    }

    public function store_contact_us(Request $request)
    {
        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['message'] = $request->message;
        // dd($input);
        $insert = ContactMessage::insert($input);
        if ($insert) {
            $notification = array(
                'message'     => 'Message Is Sent Successfully...!!',
                'alert-type'  => 'success'
            );
            return Redirect::back()->with($notification);
        }else{
            $notification = array(
                'message'     => 'Message Is not Sent Successfully...!!',
                'alert-type'  => 'warning'
            );
            return Redirect::back()->with($notification);
        }
    }
    // 
    // 
   // public function contact__submit(){

       
   //          $name=$this->input->post('name');
   //          $email=$this->input->post('email');
   //          $subject=$this->input->post('subject');
   //          $message=$this->input->post('message');

   //          $email_setting = array('mailtype' => 'html');
   //          $this->email->initialize($email_setting);
   //          $this->email->from($email,$name);
   //          $this->email->to('falconsolution18@gamil.com');

   //          $this->email->subject($subject);
   //          $this->email->message($message);
   //          $this->email->send();
          
   //          $this->session->set_flashdata('message', 'Contact Message sent Successfully');
   //          redirect('contact_us');

   //      }
//.........................................End Unused Functions & Files.........................................

}
