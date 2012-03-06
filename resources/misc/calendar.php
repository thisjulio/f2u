<?php
	
	class calendar {
	
		public $dia;
		public $mes;
		public $ano;
		public $tstamp;
		public $dtmanip;
		public $dsprimdia;
		public $linhafechada;
		public $days_link;
		
		public function calendar ( $pmes, $pano, array $days_link = NULL ) {
			$this->days_link = $days_link;
			$this->linhafechada = true;
			$this->dia = 1;
			$this->mes = $pmes;
			$this->ano = $pano;
			$this->calcula_tstamp();
			$this->data_manipulavel();
			$this->primeiro_dia_mes();
			$this->exibe_calendario(new default_template());
		}
	
		public function calcula_tstamp() {
			$this->tstamp = mktime( 0, 0, 0, $this->mes, $this->dia, $this->ano );
		}
		
		public function data_manipulavel() {
			$this->dtmanip = getdate( $this->tstamp );
		}
		
		public function primeiro_dia_mes() {
			$this->dsprimdia = $this->dtmanip[ "wday" ];
		}
	
		public function proximo_dia() {
			$this->dia++;
			$this->calcula_tstamp();         
		}
	
		public function exibe_calendario(template $control_template) {
			$casa = 0;
			$linha = 0;
			$i = -1;
			while( checkdate( $this->mes, $this->dia, $this->ano ) ) {
				if ( $casa > $this->dsprimdia ) {
					if(isset($this->days_link[$this->dia]))
						$calendar_array[$linha][]="<a href='{$this->days_link[$this->dia]}'>{$this->dia}</a>";
					else	
						$calendar_array[$linha][]=$this->dia;
					$this->proximo_dia();
				} else
					$calendar_array[$linha][]=NULL;
			
				$casa++;
				$i++;
				if(($i%7)==0)
					$linha++;
			}
			
			$nome_mes = array(
				NULL,
				"janeiro",
				"fevereiro",
				"março",
				"abril",
				"maio",
				"junho",
				"julho",
				"agosto",
				"setembro",
				"outubro",
				"novembro",
				"dezembro"
			);
			
			$control_template->view("calendar",array("calendar"=>$calendar_array, "nome_mes" => $nome_mes[$this->mes], "ano" => $this->ano));
		}
	
	}
	
	
?>
	
