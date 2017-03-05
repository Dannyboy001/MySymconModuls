<?
//  Modul f�r Utitilties
//
//	Version 0.9
//
// ************************************************************

class Utilities extends IPSModule {


	public function Create() {
		// Diese Zeile nicht l�schen.
		parent::Create();
		$this->RegisterPropertyInteger("Archiv", 27366);


	}


	// �berschreibt die intere IPS_ApplyChanges($id) Funktion
	public function ApplyChanges() {
		// Diese Zeile nicht l�schen
		parent::ApplyChanges();


	}



	public function RollierenderJahreswert(Integer $VariableID) {

		//Den Datensatz von vor 365,25 Tagen abfragen (zur Ber�cksichtigung von Schaltjahren)
		$historischeWerte = AC_GetLoggedValues($this->ReadPropertyInteger("Archiv"), $VariableID , time()-1000*24*60*60, time()-365.25*24*60*60, 1);
		$wertVor365d = 0;
		foreach($historischeWerte as $wertVorEinemJahr) {
			$wertVor365d = $wertVorEinemJahr['Value'];
		}

		return (GetValue($VariableID) - $wertVor365d);
	}

}

