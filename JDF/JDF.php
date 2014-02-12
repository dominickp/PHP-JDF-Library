<?php

class JDF
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
		// Acceptable types: Binding, Cutting, DigitalPrinting, FinalImaging, FinalRIPing, Folding, Newsprinting, PostPress, 		PrePress, Printing, ProofImaging, ProofRIPing, PublishingPreparation, RIPing, WebPrinting
		$Types = 'DigitalPrinting';
		$DescriptiveName = 'PHPJDFTicket';
		$Version = '1.2';

		// Initialize the JDF
		$JDFStart = '<JDF Type="'. $JDFType .'" xmlns="'. $XMLNS .'" ID="'. $Id .'" Status="'. $Status .'" JobPartID="'. $JobPartId .'" Version="'. $Version .'" Types="'. $Types .'" DescriptiveName="'. $DescriptiveName .'"/>';

		$this->JDFInitialize = new SimpleXMLElement($JDFStart);

	}

	public function CreateJDF()
	{
		for ($i = 1; $i <= 8; ++$i) {
			$track = $this->JDFInitialize->addChild('track');
			$track->addChild('path', "song$i.mp3");
			$track->addChild('title', "Track $i - Track Title");
		}

		return $this->JDFInitialize->asXML();
	}
}