<?php

class CreateJDF
{

	public $JDFInitialize;

	public function __construct()
	{
		// These are used to generate the initial XML field attributes
		$JDFType = 'Combined';
		$XMLNS = 'http://www.CIP4.org/JDFSchema_1_1';
		$Id = 'rootNodeId';
		$Status = 'Waiting';
		$JobPartId = '000.cdp.797';
		$Types = 'DigitalPrinting';
		$DescriptiveName = 'PHPJDFTicket';
		$Version = '1.2';

		// Initialize the JDF
		$this->JDFInitialize = '<JDF Type="'. $JDFType .'" xmlns="'. $XMLNS .'" ID="'. $Id .'" Status="'. $Status .'" JobPartID="'. $JobPartId .'" Version="'. $Version .'" Types="'. $Types .'" DescriptiveName="'. $DescriptiveName .'"/>';
	}
}