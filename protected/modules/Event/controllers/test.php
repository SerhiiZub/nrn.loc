<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 024 24.12.18
 * Time: 11:29
 */

$json = '{
  "action": "pay",
  "payment_id": 165629,
  "status": "success",
  "version": 3,
  "type": "buy",
  "paytype": "card",
  "public_key": "i000000000",
  "acq_id": 414963,
  "order_id": "10-9893399",
  "liqpay_order_id": "NYMK3AE61501685438251925",
  "description": "test",
  "sender_phone": "380950000001",
  "sender_card_mask2": "473118*97",
  "sender_card_bank": "pb",
  "sender_card_type": "visa",
  "sender_card_country": 804,
  "ip": "8.8.8.8",
  "card_token": "2DFBFE626B7341611450DE81E971E948D6F260",
  "info": "My information",
  "amount": 1000.00,
  "currency": "UAH",
  "sender_commission": 0.0,
  "receiver_commission": 0.0,
  "agent_commission": 0.0,
  "amount_debit": 0.02,
  "amount_credit": 0.02,
  "commission_debit": 0.0,
  "commission_credit": 0.0,
  "currency_debit": "UAH",
  "currency_credit": "UAH",
  "sender_bonus": 0.0,
  "amount_bonus": 0.0,
  "bonus_type": "bonusplus",
  "bonus_procent": 7.0,
  "authcode_debit": "108527",
  "authcode_credit": "703006",
  "rrn_debit": "000664267598",
  "rrn_credit": "000664267607",
  "mpi_eci": "7",
  "is_3ds": false,
  "create_date": 1501757716373,
  "end_date": 1501757729972,
  "moment_part": true,
  "transaction_id": 165629
}';

echo $b = base64_encode($json);