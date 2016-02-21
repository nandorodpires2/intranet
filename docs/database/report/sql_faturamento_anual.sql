select	year(a.faturamento_vencimento) as ano,
			sum(a.faturamento_valor) as total,
			60000 - sum(a.faturamento_valor) as restante
from		faturamento a
group by year(a.faturamento_vencimento)