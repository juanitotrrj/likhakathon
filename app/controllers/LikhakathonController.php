<?php

class LikhakathonController extends \BaseController {

	private $return = array();

	public function AddApplicant()
	{
		/*
		$a = Name
		$b = Address
		$c = Contact Info
		*/

		$a = Input::get('a');
		$b = Input::get('b');
		$c = Input::get('c');
		$d = Input::get('d');
		$e = Input::get('e');
		$f = Input::get('f');
		$g = Input::get('g');
		$h = Input::get('h');
		$i = Input::get('i');
		$j = Input::get('j');

		$applicant = new Applicant;
		$applicant->Firstname = $a;
		$applicant->Lastname = $b;
		$applicant->Midname = $c;
		$applicant->Birthdate = date('Y-m-d H:i:s', $d);
		$applicant->Address = $e;
		$applicant->City = $f;
		$applicant->State = $g;
		$applicant->Country = $h;
		$applicant->ContactNumber = $i;
		$applicant->EmailAddress = $j;
		$check = $applicant->save();

		$this->return = array();
		if ($check) {
			$this->return['a'] = 0;
			$this->return['b'] = '';
		} else {
			$this->return['a'] = 1;
			$this->return['b'] = 'Unable to add this applicant.';
		}

		return Response::json($this->return);
	}

	public function UpdateApplicant($a, $b, $c)
	{
		/*
		$a = ApplicantId
		$b = ApplicantDetails
		$c = field name
		*/

		$c = intval($c);
		if ($c >= 0 && $c <= 9)
		{
			$applicant = Applicant::find($a);
			
			switch ($c)
			{
				case 0:
					$applicant->Firstname = $a;
					break;
				case 1:
					$applicant->Lastname = $b;
					break;
				case 2:
					$applicant->Midname = $c;
					break;
				case 3:
					$applicant->Birthdate = date('Y-m-d H:i:s', $d);
					break;
				case 4:
					$applicant->Address = $e;
					break;
				case 5:
					$applicant->City = $f;
					break;
				case 6:
					$applicant->State = $g;
					break;
				case 7:
					$applicant->Country = $h;
					break;
				case 8:
					$applicant->ContactNumber = $i;
					break;
				case 9:
					$applicant->EmailAddress = $j;
					break;
			}
			
			$check = $applicant->save();

			$this->return = array();
			if ($check) {
				$this->return['a'] = 0;
				$this->return['b'] = '';
			} else {
				$this->return['a'] = 1;
				$this->return['b'] = "Unable to update this applicant's details.";
			}

			return Response::json($this->return);
		}
	}

	public function AddApplicantSkill($a, $b)
	{
		/*
		$a = ApplicantId
		$b = Skillset
		*/
		
		$applicant_skill = new ApplicantSkills;
		$applicant_skill->ApplicantId = $a;
		$applicant_skill->SkillsetPoolId = $b;
		$check = $applicant_skill->save();

		$this->return = array();
		if ($check) {
			$this->return['a'] = 0;
			$this->return['b'] = '';
		} else {
			$this->return['a'] = 1;
			$this->return['b'] = "Unable to add this applicant skill.";
		}

		return Response::json($this->return);
	}

	public function AddSkillSet($a)
	{
		/*
		$a = SkillsetDesc
		*/

		$skill = new SkillsetPool;
		$skill->SkillsetDesc = $a;
		$check = $skill->save();

		$this->return = array();
		if ($check) {
			$this->return['a'] = 0;
			$this->return['b'] = '';
		} else {
			$this->return['a'] = 1;
			$this->return['b'] = "Unable to add this skill.";
		}

		return Response::json($this->return);
	}

	public function UpdateSkillSet($a, $b)
	{
		/*
		$a = SkillsetId
		$b = SkillsetDesc
		*/

		$skill = SkillsetPool::find($a);
		$skill->SkillsetDesc = $b;
		$check = $skill->save();

		$this->return = array();
		if ($check) {
			$this->return['a'] = 0;
			$this->return['b'] = '';
		} else {
			$this->return['a'] = 1;
			$this->return['b'] = "Unable to update this skill.";
		}

		return Response::json($this->return);
	}

	public function AddApplicantInteraction($a, $b, $c)
	{
		/*
		$a = ApplicantId
		$b = InteractionTypeId
		$c = Detail text
		*/
		
		$applicant_inter = new InteractionLog;
		$applicant_inter->ApplicantId = $a;
		$applicant_inter->InteractionTypeId = $b;
		$applicant_inter->DateTime = date('Y-m-d H:i:s');
		$applicant_inter->Remarks = $c;
		$check = $applicant_inter->save();

		$this->return = array();
		if ($check) {
			$this->return['a'] = 0;
			$this->return['b'] = '';
		} else {
			$this->return['a'] = 1;
			$this->return['b'] = "Unable to add this applicant's interaction.";
		}

		return Response::json($this->return);
	}

	public function UpdateApplicantInteraction($a, $b)
	{
		/*
		$a = InteractionLogId
		$b = Detail text
		*/
		
		$applicant_inter = InteractionLog::find($a);
		$applicant_inter->DateTime = date('Y-m-d H:i:s');
		$applicant_inter->Remarks = $b;
		$check = $applicant_inter->save();

		$this->return = array();
		if ($check) {
			$this->return['a'] = 0;
			$this->return['b'] = '';
		} else {
			$this->return['a'] = 1;
			$this->return['b'] = "Unable to update this applicant's interaction.";
		}

		return Response::json($this->return);
	}

	public function AddInteraction($a)
	{
		/*
		$a = InteractionDesc
		*/
		
		$interaction = new InteractionType;
		$interaction->InteractionDesc = $a;
		$check = $interaction->save();

		$this->return = array();
		if ($check) {
			$this->return['a'] = 0;
			$this->return['b'] = '';
		} else {
			$this->return['a'] = 1;
			$this->return['b'] = "Unable to add this interaction.";
		}

		return Response::json($this->return);
	}

	public function UpdateInteraction($a, $b)
	{
		/*
		$a = InteractionId
		$b = InteractionDesc
		*/
		$interaction = InteractionType::find($a);
		$interaction->InteractionDesc = $a;
		$check = $interaction->save();

		$this->return = array();
		if ($check) {
			$this->return['a'] = 0;
			$this->return['b'] = '';
		} else {
			$this->return['a'] = 1;
			$this->return['b'] = "Unable to update this interaction.";
		}

		return Response::json($this->return);
	}

	public function GetApplicantTotal()
	{
		// Return number of total applicants
		$this->return = array();
		$this->return['a'] = Applicant::all()->count();
		$this->return['b'] = '';

		return Response::json($this->return);
	}

	public function GetApplicantStat($a)
	{
		/*
		$a = ApplicantId
		*/

		$this->return = array();
		$applicant = Applicant::find($a);
		if ($applicant) {
			$this->return[] = $applicant->Firstname;
			$this->return[] = $applicant->Lastname;
			$this->return[] = $applicant->Midname;
			$this->return[] = $applicant->Birthdate;
			$this->return[] = $applicant->Address;
			$this->return[] = $applicant->City;
			$this->return[] = $applicant->State;
			$this->return[] = $applicant->Country;
			$this->return[] = $applicant->ContactNumber;
			$this->return[] = $applicant->EmailAddress;
			$this->return['a'] = 0;
		} else {
			$this->return['a'] = 1;
			$this->return['b'] = 'Unable to add this applicant.';
		}

		return Response::json($this->return);
	}

	public function GetSkillsetStat($a)
	{
		/*
		$a = SkillsetId
		*/

		$this->return = array();
		$skill = SkillsetPool::find($a);
		if ($skill) {
			$this->return[] = $skill->SkillsetDesc;
			$this->return['a'] = 0;
		} else {
			$this->return['a'] = 1;
			$this->return['b'] = 'Unable to add this applicant.';
		}

		return Response::json($this->return);
	}

	public function GetApplicantLog($a)
	{
		/*
		$a = ApplicantId
		*/

		$this->return = array();
		$skill = SkillsetPool::where('ApplicantId', '=', $a)->orderBy('id')->get();
		if ($skill) {
			$this->return[] = $skill;
			$this->return['a'] = 0;
		} else {
			$this->return['a'] = 1;
			$this->return['b'] = "Unable to get this applicant's logs.";
		}

		return Response::json($this->return);
	}

	public function GetInteractions($a)
	{
		/*
		$a = ApplicantId
		*/

		$this->return = array();
		$skill = InteractionType::all()->orderBy('id')->get();
		if ($skill) {
			$this->return[] = $skill;
			$this->return['a'] = 0;
		} else {
			$this->return['a'] = 1;
			$this->return['b'] = "Unable to get interactions.";
		}

		return Response::json($this->return);
	}

	public function GetApplicantSkills($a)
	{
		/*
		$a = ApplicantId
		*/

		$this->return = array();
		$skill = ApplicantSkills::all()->orderBy('id')->get();
		if ($skill) {
			$this->return[] = $skill;
			$this->return['a'] = 0;
		} else {
			$this->return['a'] = 1;
			$this->return['b'] = "Unable to get this applicant's skill(s).";
		}

		return Response::json($this->return);
	}
}