<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_Model extends CI_Model {

    private $invoiceNumber;
    private $invoiceDateEmi;
    private $invoiceTotalValue;
    private $invoiceDest;//Object -- Nao deu tempo
    
    private $invoiceEmi;
    private $invoiceNprot;

    /**
     * 
     * O correto seria um parser separado pra pegar essas informacoes, 
     * tendo em vista as variacoes que o XML pode ter
     */
    public function set_from_xml($xmlObject) {
        if(isset($xmlObject->NFe)) {
            $this->invoiceNumber = $xmlObject->NFe->infNFe->attributes()->Id;
            $this->invoiceDateEmi = $xmlObject->NFe->infNFe->ide->dhEmi;
            $this->invoiceTotalValue = $xmlObject->NFe->infNFe->total->ICMSTot->vNF;

            $this->invoiceEmi = $xmlObject->NFe->infNFe->emit->CNPJ;
            $this->invoiceNprot = $xmlObject->protNFe->infProt->nProt;        
        }else if(isset($xmlObject->infNFe)) {
            $this->invoiceNumber = $xmlObject->infNFe->attributes()->Id;
            $this->invoiceDateEmi = $xmlObject->infNFe->ide->dhEmi;
            $this->invoiceTotalValue = $xmlObject->infNFe->total->ICMSTot->vNF;

            $this->invoiceEmi = $xmlObject->infNFe->emit->CNPJ;
            $this->invoiceNprot = isset($xmlObject->protNFe->infProt->nProt) ? $xmlObject->protNFe->infProt->nProt : null;  
        }else {
            die('XML Invalid Format');
        }
    }

    public function get_from_database() {
        return $this->db->select('*')
            ->from('invoices')
            ->get()
            ->result();
    }

    public function validate() {
        return $this->invoiceEmi == '09066241000884' && $this->invoiceNprot ? true : false;
    }

    public function set_to_database() {
        $data_to_insert = [
            'invoice_number' => $this->invoiceNumber,
            'invoice_date_emi' => $this->invoiceDateEmi,
            'invoice_total_value' => $this->invoiceTotalValue
        ];

        $already_inserted = $this->db->select('*')
            ->from('invoices')
            ->where(['invoice_number' => $this->invoiceNumber])
            ->get()
            ->num_rows();

        if(!$already_inserted) {
            $this->db->insert('invoices', $data_to_insert);
        }else {
            die('XML Already loaded');
        }
    }
}